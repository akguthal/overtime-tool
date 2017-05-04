$(document).ready(main);

function main() {    
    console.log("main");
    let ajax = new XMLHttpRequest();
    ajax.open("GET", "loadHome.php", false);
}

function clickProfile() {
    
}

function clickConnection($this) {
    let email = $($this).find("h3").text();
    console.log(email);
    
    let ajax = new XMLHttpRequest();
    ajax.open("GET", "", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState === 4) {
            if (ajax.status === 200) {
                let results = ajax.responseText;
                
            } else {
               alert("Request Failed.");
            }
        }    
    };
}

function clickPerson($this) {
    let email = $($this).find("h3").text();
    console.log(email);
}