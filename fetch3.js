$(function(){
    $.getJSON("fetchpname.php",success=function(data)
    {
        
        var x=$("#pgm2");
        for (k = 0; k < data.length; k++)
        x.append("<option value='" + data[k]+ "'>" + data[k] + "</option>");
        x.change();
       
        
    });
    
    $("#pgm2").change(function()
    {
         $.getJSON("fetchfunction.php?name="+ $(this).val(),success=function(data)
        {
        var x=$("#func1");
        x.html("");
        for (k = 0; k < data.length; k++)
        x.append("<option value='" + data[k]+ "'>" + data[k] + "</option>");
        x.change();
        });
        
    });
        
});