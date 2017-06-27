$(function(){
    var ans_ticked;
//getting all cookies from cache
        if(Cookies.get('cook'))
        {
            //json parsing
            ans_ticked=JSON.parse(Cookies.get('cook'));
   
            for (x in ans_ticked) {
                if(!isNaN(parseInt(ans_ticked[x])))
                {
                console.log("insite optins");
                var sel = "input[name='" + x + "'][value='" + ans_ticked[x] + "']";
                $(sel).prop("checked", true);
                }
                else
                {
                    console.log("inside txtare");
                    var sel= "textarea[name='"+x+"']";
        
                    $(sel).val(ans_ticked[x])
                }

            }
        }
        else
        {
            ans_ticked={};
        }
    
    $('textarea').on('keypress',function(e){
        var ques=$(this).attr('name');
       var option=($(this).val());
     console.log(option);
       ans_ticked[ques] = option;
       var cook=JSON.stringify(ans_ticked);
       console.log(cook);
       Cookies.set('cook',cook);
    })
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