consoleText(['An investment in knowledge pays the best interest','Education is a way to question the unknown.','Learn today and have a bright future.','Education is your basic right; you know that, right?','The only weapon to fight injustice is Education.'],'text',['#235284', '#235284', '#235284', '#235284', '#235284']);

        function consoleText(words,id,color){
            if(color===undefined){
                color=['#235284'];
            }
            var visible=true;
            var con=document.getElementById('typing');
            var lettercount=1;
            var x=1;
            var waiting =false;
            var target=document.getElementById(id);
            target.setAttribute('style','color:'+color[0])
            window.setInterval(function(){
                if(lettercount===0&& waiting===false){
                    waiting=true;
                    target.innerHTML=words[0].substring(0,lettercount)
                    window.setTimeout(function(){
                        var usedcolor=color.shift();
                        color.push(usedcolor);
                        var usedword=words.shift();
                        words.push(usedword);
                        x=1;
                        target.setAttribute('style','color:'+color[0])
                        lettercount+=x;
                        waiting=false;
                    },1000);
                }else if(lettercount===words[0].length+1 && waiting===false){
                    waiting=true;
                    window.setTimeout(function(){
                        x=-1;
                        lettercount+=x;
                        waiting=false;
                    },1000)
                }else if(waiting===false){
                    target.innerHTML=words[0].substring(0,lettercount);
                    lettercount+=x;
                }
            },120);

            window.setInterval(function(){
                if(visible===true){
                    con.className="typo hidden";
                    visible=false;
                }else{
                    con.className="typo";
                    visible=true;
                }

            },400)
        }


let navContact=document.getElementById("nav1")

window.addEventListener('scroll',()=>{
    var y=window.scrollY;
    if(y>5){
        navContact.style.display="none"
    }else{
        navContact.style.display="flex"
    }
})

document.addEventListener('scroll', function (e) {
    var top  = window.pageYOffset + window.innerHeight,
        isVisible = top > document.querySelector('#sstatistics > h2').offsetTop;
    
        if (isVisible) {
            let valueDisplay=document.querySelectorAll('.num')
            let interval=4000;
    
            valueDisplay.forEach(valueDisplay=>{
                let startValue=0;
                let endValue=parseInt(valueDisplay.getAttribute("data-val"))
                console.log(endValue)
                let duration=Math.floor(interval/endValue)
                let counter=setInterval(function(){
                    startValue+=5
                    valueDisplay.textContent=startValue
                    if(startValue==endValue){
                        clearInterval(counter)
                    }
                },duration);
                
                })
        }
    });

let slider=document.getElementById("ourPartners")

const source=["./images/patner.png","./images/patner2.png","./images/patner3.png","./images/patner4.png"]

let image=document.createElement('img')
let duration
let index=0

setInterval(function(){
    image.src=source[index]
    index+=1
    if(index>=source.length){
        index=0
    }
    console.log(index)
},1000)

slider.appendChild(image)
