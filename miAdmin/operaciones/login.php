<?php 


                date_default_timezone_set("America/Mexico_City");
                $date = date("Y-m-d");
        
                $email = $_POST['user'];
                $pass = $_POST['pass'];
                $passmd5 = md5($pass);

                include("db.php");//Incluye los datos de acceso a la BD
                $conn = mysqli_connect($servername, $username, $password, $database);

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                    echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
                }
                else{
          
                    if(isset($_POST['pass']) && !empty($_POST['pass']) AND isset($_POST['user']) && !empty($_POST['user'])){
                            
                            
                            $sql2 = "SELECT * FROM admin WHERE usuario ='".$email."' AND pass = '".$passmd5."'";
                            $result2 = $conn->query($sql2);
                        
                            if($result2->num_rows == 0) {
                        
                                
                                    $noti = "El Correo o la contraseña son incorrectos, intente de Nuevo.";
                                
                                    $notiCK = "notificacion";
                                    $notiCK_value = $noti;
                                    setcookie($notiCK, $notiCK_value, 0, "/"); // 86400 = 1 day
                                    
                                    header('Location: ../');
                        
                            }
                        else{
                            
                            $sql = "SELECT * FROM clientes WHERE usuario ='".$email."' AND pass = '".$passmd5."' AND active ='0'";
                            $result = $conn->query($sql);
                            
                            if($result->num_rows >= 1) {

                                    $noti = "La cuenta no está activada, revise su correo para activarla.";
                                
                                    $notiCK = "notificacion";
                                    $notiCK_value = $noti;
                                    setcookie($notiCK, $notiCK_value, 0, "/"); // 86400 = 1 day
                                    
                                    header('Location: ../');
                        
                                }
                            else{
        //                          echo "<script type='text/javascript'>alert('Credenciales correctas y Está activada.');window.location = '../panelusuario.php';</script>";
                                    
                                    $sql3 = "SELECT * FROM admin WHERE usuario ='".$email."' AND pass = '".$passmd5."'";
                                    $result3 = $conn->query($sql3);
                                    $row = $result3->fetch_assoc();
                            
                                    $nombreusuario = $row['nombre'];
                                    $hash = $row['hash'];
                                
                                    $p1 = rand(100000,900000);
                                    $p2 = rand(100000,900000);
                                
                                
                                    //Define cipher 
                                    $cipher = "aes-256-cbc"; 

                                    //Generate a 256-bit encryption key 
                                    $encryption_key = "fcYc!9mQnEQ>\nXk?8j6a$\,fK-u"; 

                                    // Generate an initialization vector 
                                    $iv_size = openssl_cipher_iv_length($cipher); 
                                    $iv = "8TnzbZ(M(9CUn,hX"; 

                                    //Data to encrypt 
                                    $data = $email; 
                                    $encrypted_data = openssl_encrypt($data, $cipher, $encryption_key, 0, $iv); 
                                
                                
                                    $cookie_name = "1be067584467e484c5bfc571bb26ef73";
                                    $cookie_value = $p1.strrev($passmd5).$p2;
                                    setcookie($cookie_name, $cookie_value, 0, "/"); // 86400 = 1 day
                                    
                                    $usercrypt = "f8032d5cae3de20fcec887f395ec9a6a";
                                    $usercrypt_value = $encrypted_data;
                                    setcookie($usercrypt, $usercrypt_value, 0, "/"); // 86400 = 1 day
                                    
                                    header('Location: ../directorio.php');
                            }
                            
                        }
                            
                            
                            
                        }
                    
                    
                    $conn->close();
                }

        

?>