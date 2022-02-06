document.addEventListener("DOMContentLoaded", function() {
    let form = document.querySelector("#form");
    form.addEventListener("submit", sendForm);

    async function sendForm(e) {
        e.preventDefault();
    
        let formData = new FormData(form);
        console.log("formatData", formData);

        const userName = document.querySelector("#userName");
        const userEmail = document.querySelector("#userEmail");
        const userMessage = document.querySelector("#userMessage");
        // let form = document.querySelector("#form");
        let userData = {};
        

        userData.name = userName.value;
        userData.email =userEmail.value;
        userData.message = userMessage.value;
        console.log("userData", userData);

        // form.classList.add("_sending");

        // let response = await fetch('sendmail.php', {
        //     method: 'POST',
        //     body: userData
        //     // body: formData
        // })
        // console.log("response", response);
        // if (response.ok) {
        //     alert("works!");
        //     let result = await response.json();
        //     alert(result.message);
        //     form.reset();
        //     form.classList.remove("_sending");
        // } 
        // else {
        //     alert("Oops");
        //     form.classList.remove("_sending");
        // }
    }
    
})  