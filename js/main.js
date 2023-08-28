function validateForm(){
   var name=document.getElementById("name").value;
   var email = document.getElementById("email").value;
   var subject = document.getElementById("subject").value;
   var message = document.getElementById("message").value;
   var pincode = document.getElementById("pincode").value;
   var user2 =document.getElementById("pincode");

   if(name==""){
    alert("Please enter your name");
    return false;
   }
   var regx=/^[a-zA-Z\s]+$/;
   if(regx.test(name)===false)
   {
    alert("Please enter a valid name");
   }

   if(email==""){
    alert("Please enter email");
    return false;
   }
   var regx=/^\S+@\S+\.\S+$/;
   if (regx.test(email)===false)
   alert("Please enter a valid email");

   if(subject==""){
    alert("Please enter the subject");
    return false;
   }

   if(message==""){
    alert("Please enter the message");
    return false;
   }
   var re = /^[7-9][0-9]$/;
            if (re.test(pincode)) {
                alert("done");
                return true;
            }
            else {
  
                user2.style.border = "red solid 3px";
                return false;
            }
        }

