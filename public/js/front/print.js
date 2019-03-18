$(document).ready(function () {
    function printdiv(printpage){ 
        var newstr = printpage.innerHTML;
        var oldstr = document.body.innerHTML;
        document.body.innerHTML =newstr;
        window.print();
        document.body.innerHTML=oldstr;
        return false;
    }
    window.onload=function(){
        var print_bt = document.getElementById("print_bt");
        var page_print=document.getElementById("page_print");
        print_bt.onclick=function(){
            printdiv(page_print);
        }
    }
})