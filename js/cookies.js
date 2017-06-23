$(function(){
    var ans_ticked;

        if(Cookies.get('cook'))
        {
            ans_ticked=JSON.parse(Cookies.get('cook'));
            for (x in ans_ticked) {
                var sel = "input[name='" + x + "'][value='" + ans_ticked[x] + "']";
                //sel='"'+sel+'"';
                
                $(sel).prop("checked", true);

            }
        }
        else
        {
            ans_ticked={};
        }
    
    

    var person = {firstName:"John", lastName:"Doe", age:50, eyeColor:"blue"};
    $('input[type="radio"]').click(function(){
        var ques=$(this).attr('name');
        var option=$(this).val() ;
        ans_ticked[ques] = option;
        console.log(ans_ticked);
        var cook=JSON.stringify(ans_ticked);
        console.log(cook);
        Cookies.set('cook',cook);

    }
    );
});