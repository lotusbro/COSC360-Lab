function blank(input)
{
    if(input.type=="checkbox")
    {
    if(input.checked)
    {
     return false;  
    }    
    return true;
    }
    if (input.value=="" )
    {
    return true;
    }
    return false;
} 
window.onload= function()
{
    var required = document.getElementsByClassName("required");
    var mainform= document.getElementById("mainForm");
 
    mainform.addEventListener("submit",function(event)
    {
        for(var i=0;i<required.length;i++)
        {
            if(blank(required[i]))
            {
                event.preventDefault();
                var rectangle= document.getElementsByClassName("rectangle");
               required[i].style.backgroundColor="red";
            //    if(required[i].type=="checkbox")
            //    {
            //        rectangle.style.backgroundColor="red";
            //    } 
               required[i].parentNode.style.backgroundColor="red";  
               required[i].addEventListener("change",function(event){
                event.target.style.backgroundColor="white";
                event.target.parentNode.style.backgroundColor="white";
               } );           
            }
    
        }
    });  
};
