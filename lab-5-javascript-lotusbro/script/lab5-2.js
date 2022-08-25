window.onload = function () {
    var body = document.getElementsByTagName("*");
    for (var i = 0; i < body.length; i++) 
    {
        if (body[i].nodeType!=3 && body[i].className!="hoverNode") {
            let child = document.createElement("span");
            child.className = "hoverNode";
           // child.innerHTML = body[i].tagName;
           let textNode= document.createTextNode(body[i].tagName);
           child.appendChild(textNode);
            let name= body[i].tagName;
            let inner= body[i].innerHTML;
            body[i].appendChild(child);
            let string= "This tag is " + name+" type tag" + "The contents of the tag is "+ inner;
            child.addEventListener("click", function () 
            {
                alert(string);
            });
        }
        
    }
    
};
