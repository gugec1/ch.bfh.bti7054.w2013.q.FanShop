function validate() {
        
        var lastName = document.getElementById("lastName").value;
        var expLastName = new RegExp("[A-Za-z]"); //Buchstaben,Leerzeichen, Bindestrich erlaubt 
        if(lastName.length < 2 || lastName.length > 30){
            alert("The last name must be 2-30 characters")
            return false;
        }else if(!expLastName.test(lastName)){
            alert("Der Name besitzt unerlaubte Zeichen.");
            document.getElementById("lastName").select();
            return false;
        }
        
     
        var firstName = document.getElementById("firstName").value;
        var expFirstName = new RegExp("[A-Za-z\s\-]");
        if(firstName.length == 0){
            alert("Bitte geben Sie Ihren Vornamen ein.")
            return false;
        }else if(!expFirstName.test(firstName)){
            alert("Der Vorname besitzt unerlaubte Zeichen.");
            document.getElementById("firstName").select();
            return false;
        }
     
        var street = document.getElementById("street").value;
        var expStreet = new RegExp("[A-Za-z0-9\s\-]");
        if(street.length == 0){
            alert("Bitte geben Sie die Strasse ein.")
            return false;
        }else if(!expStreet.test(street)){
            alert("Die Strasse besitzt unerlaubte Zeichen.");
            document.getElementById("street").select();
            return false;
        }
        
        var plz = document.getElementById("zip").value;
        var expPlz = new RegExp("[0-9]{4,4}");
        if(plz.length == 0){
            alert("Bitte geben Sie die Postleitzahl ein.")
            return false;
        }else if(!expPlz.test(plz)){
            alert("Die Postleitzahl besitzt unerlaubte Zeichen.");
            document.getElementById("zip").select();
            return false;
        }
        
        var city = document.getElementById("city").value;
        var expCity = new RegExp("[A-Za-z]");
        if(city.length == 0){
            alert("Bitte geben Sie den Ort ein.")
            return false;
        }else if(!expCity.test(city)){
            alert("Der Ort besitzt unerlaubte Zeichen.");
            document.getElementById("city").select();
            return false;
        }
                
        var email = document.getElementById("email").value;
        var expEmail = new RegExp("[A-Za-z0-9.]+@[A-Za-z0-9.]+\.[A-Za-z]{2,3}");
        if(email.length == 0){
            alert("Bitte geben Sie die Email-Adresse ein.")
            return false;
        }else if(!expEmail.test(email)){
            alert("Die Email-Adresse besitzt unerlaubte Zeichen.");
            document.getElementById("email").select();
            return false;
        }
        
        
        document.getElementById("registrationForm").submit();
        
}

