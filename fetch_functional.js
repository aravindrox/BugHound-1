$(function(){
    $.getJSON("fetchpname.php",success=function(data)
    {
        
        var x=$("#pgm");
        for (k = 0; k < data.length; k++)
        x.append("<option value='" + data[k]+ "'>" + data[k] + "</option>");
        x.change();
       
        
    });
    
    $("#pgm").change(function()
    {
         $.getJSON("fetchFunctional.php?name="+ $(this).val(),success=function(data)
        {
        var x=$("#functional");
        x.html("");
        for (k = 0; k < data.length; k++)
        x.append("<option value='" + data[k]+ "'>" + data[k] + "</option>");
        x.change();
        });
        
    });
        
});