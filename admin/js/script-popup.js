window.addEventListener("load", function(){
    setTimeout(
        function open(event) {           
            document.querySelector(".popup").style.opacity = "1";
            document.querySelector(".popup").style.display = "block";
        },
        200
    )
});


document.querySelector("#close").addEventListener("click", function () {
    document.querySelector(".popup").style.opacity = "0";
    document.querySelector(".popup").style.display = "none";
});