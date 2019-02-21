

    var domain = window.location.origin;
const container = document.getElementById('container');
const defaultpath = "localhost/app/home";
const path = window.location.pathname;
const search = window.location.search;
var body = $("body#aside");

$( document ).ready(function() {
    console.log( "ready!" );
    
    $(window).on('popstate',function(){
        
        var url = domain+window.location.pathname
        url = url.split('/').pop();
        url = '/'+url;
        loadback(url); 
    });



    
      $("#aside").find('a').on('click',function(e) {
      
          
    
                        
    e.preventDefault(); 
    url = $(this).attr('href');
    loadback(url);
    history.pushState(null,null,"/app"+url);
    
          
     
    });
    
    
});

    
    
    

function loadback(url){
url = window.location.origin+"/app/ajax"+url;

fetch(url)
.then(response => response.text())
.then(data => {
    container.innerHTML = data;
})
.catch(error => {container.innerHTML = error;})

    
}


