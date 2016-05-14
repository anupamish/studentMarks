<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>Register in to Student Result Processing System</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" type="text/css" href="http://localhost/studentMarks/css/styleRegister.css"/>
        
    </head>
    <body>
    	    
        <form  action="http://localhost/studentMarks/phpIncludes/registerForm.php" class="register" method="post">
        <div align="right">
            <a href="http://localhost/studentMarks/views/index.php"><img height="20" width="20" src="http://localhost://studentMarks/imageResources/Close.png"></a>
            </div>

            <h1>Registration</h1>
            
            <fieldset class="row1">
                <legend>Account Details
                </legend>
                <p>
                    <label>Email *
                    </label>
                    <input type="text" required name="email"/>
                </p>
                 <p>
                    <label>Password*
                    </label>
                    <input type="password"  required name="password"/>
                    <label>Repeat Password*
                    </label>
                    <input type="password"  required name="rpassword"/>
                    <label class="obinfo">* obligatory fields
                    </label>
                </p>
            </fieldset>
            <fieldset class="row2">
                <legend>Personal Details
                </legend>
                <p>
                    <label>First Name *
                    </label>
                    <input type="text" class="long" required name="fname"/>
                </p>
				<p>
                    <label>Last Name *
                    </label>
                    <input type="text" class="long" required name="lname"/>
                </p>
                 <p>
                    <label>Gender </label>
                    <input type="radio" name="gender" value="male" checked>
                     <label class="gender">Male</label>
                    <input type="radio" name="gender" value="female"> 
                    <label class="gender">Female</label>
                </p>
				
                  
                
            </fieldset>
            <fieldset class="row3">
                <legend>School Information
                </legend>
               
                <p>
                    <label>School *
                    </label>
                    <select required name="school">
                        <option value="soe">School of Engineering
                        </option>
                        <option value="sovs">School of Vocational Studies and Applied Sciences
                        </option>
                        <option value="sobt">School of Biotechnology
                        </option>
                        <option value="som">School of Management
                        </option>
                        <option value="soict">School of Information and Communication Technology
                        </option>
                        <option value="sol">School of Law, Justice and Governance
                        </option>
                        <option value="sobsc">School of Buddhist Studies and Civilization
                        </option>
                        <option value="sohss">School of Humanities and Social Sciences
                        </option>
                     </select>
                </p>
				<p>
                    <label>Designation *
                    </label>
                    <select required name= "designation">
                        <option value="pro">Professor
                        </option>
                        <option value="apro">Assistant Professor
                        </option>
                        <option value="aspro">Associate Professor
                        </option>
                        <option value="rfa">Research/Faculty Associate
                        </option>
                     </select>
                </p>
				<p>
                    <label>Office Number
                    </label>
                    <input type="text" class="long" name="officeNumber"/>
                </p>
                <div class="infobox"><h4>Helpful Information</h4>
                    <div class="infobox_text">
                    <p>1. Please use your University provided E-Mail ID for Registration.</p>
					<p>2. Details which are not necessary during registration can be reset later.</p>
					<p>3. Password should consist of UpperCase, LowerCase and Number.</p>
                    </div>
                </div>
            </fieldset>
            <fieldset class="row4">
                <legend>Terms and Mailing
                </legend>
                <p class="agreement">
                    <input type="checkbox" value="" required/>
                    <label>*  I accept the <a href="#">Terms and Conditions</a></label>
                </p>
              </fieldset>
            <div><button class="button" name="register">Register</button></div>

        </form>
      </body>
</html>





