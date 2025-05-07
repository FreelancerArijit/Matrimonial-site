console.log("hello world");

const search_button = document.querySelector("#search-btn");
const search_bar = document.querySelector("#search-bar");
const expanded_search_button = document.querySelector("#expanded-search-btn");

search_button.addEventListener("click", function() {
    console.log("button clicked");
    
    if (search_bar.style.display === "none") {
        search_bar.style.display = "block";
        search_button.style.display = "none";
    } 
})

expanded_search_button.addEventListener("click", function() {
    console.log("button clicked 2");

    if (search_bar.style.display === "block") {
        search_bar.style.display = "none";
        search_button.style.display = "block";
    }
})





document.addEventListener("DOMContentLoaded", function() {

    const login_button = document.querySelector("#login-btn");
    const login_container = document.querySelector("#login-container");
    
    
    login_button.addEventListener("click", function() {
                console.log("login clicked");   
       
    
        if (login_container.style.display === "none" || login_container.style.display === "") {
            login_container.style.display = "block";        
        } else{
            login_container.style.display = "none";
        }
    })
    
     document.addEventListener("click", function() {
        console.log("document clicked");
        login_container.style.display = "none";
    });
    
   
    
    })
    
    