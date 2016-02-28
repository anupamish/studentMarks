<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>Register in to Student Result Processing System</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" type="text/css" href="http://localhost/studentMarks/css/styleRegister.css"/>
    </head>
    <body>    
        <form action="" class="register">
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
                    <input type="text" required/>
                </p>
                <p>
                    <label>Password*
                    </label>
                    <input type="text" required />
                    <label>Repeat Password*
                    </label>
                    <input type="text" required/>
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
                    <input type="text" class="long" required/>
                </p>
				<p>
                    <label>Last Name *
                    </label>
                    <input type="text" class="long" required/>
                </p>
                 <p>
                    <label>Gender </label>
                    <input type="radio" name="gender" value="male" checked>
                     <label class="gender">Male</label>
                    <input type="radio" name="gender" value="female"> 
                    <label class="gender">Female</label>
                </p>
				<p>
                    <label>Profile Picture
                    </label>
                    <input type="file" name="#" id="#" />
                </p>
                
            </fieldset>
            <fieldset class="row3">
                <legend>School Information
                </legend>
               
                <p>
                    <label>School *
                    </label>
                    <select required>
                        <option value="1">School of Engineering
                        </option>
                        <option value="2">School of Vocational Studies and Applied Sciences
                        </option>
                        <option value="3">School of Biotechnology
                        </option>
                        <option value="4">School of Management
                        </option>
                        <option value="5">School of Information and Communication Technology
                        </option>
                        <option value="6">School of Law, Justice and Governance
                        </option>
                        <option value="7">School of Buddhist Studies and Civilization
                        </option>
                        <option value="8">School of Humanities and Social Sciences
                        </option>
                     </select>
                </p>
				<p>
                    <label>Designation *
                    </label>
                    <select required>
                        <option value="1">Professor
                        </option>
                        <option value="2">Assistant Professor
                        </option>
                        <option value="3">Associate Professor
                        </option>
                        <option value="4">Research/Faculty Associate
                        </option>
                     </select>
                </p>
				<p>
                    <label>Office Number
                    </label>
                    <input type="text" class="long"/>
                </p>
                <div class="infobox"><h4>Helpful Information</h4>
                    <div class="infobox_text">
                    <p>1. Please use your University provided E-Mail ID for Registration.</p>
					<p>2. Details which are not necessary during registration can be reset later.</p>
					<p>3. Contact Administrator for any other enquiries.</p>
                    </div>
                </div>
            </fieldset>
            <fieldset class="row4">
                <legend>Terms and Mailing
                </legend>
                <p class="agreement">
                    <input type="checkbox" value=""/>
                    <label>*  I accept the <a href="#">Terms and Conditions</a></label>
                </p>
              </fieldset>
            <div><button class="button">Register</button></div>

        </form>
    </body>
</html>





