

function check()
{
        var keywords = document.getElementById("mySelect").value;
        var from = document.getElementById("from").value;
        var to = document.getElementById("to").value;
        //console.log(keywords);

        
            if (keywords.length > 0) {

                $.post(
                'viewpayment',
                 {keywords: keywords, from:from, to:to}, 
                 function(markup){
               
                     $('#search-results').html(markup);
                
               
            });
            }else{
                   $('#search-results').empty();
            }
            
        

    }