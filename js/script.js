var currentPath = window.location.pathname;
var navigationLinks = document.querySelectorAll(".navigation a");
if(currentPath == "/about.html"){
	navigationLinks[1].style.color = "lightskyblue";
} else if (currentPath == "/timeline.html"){
	navigationLinks[2].style.color = "lightskyblue";
} else if (currentPath == "/contact.html"){
	navigationLinks[3].style.color = "lightskyblue";
} else if (currentPath == "/imprint.html"){
	navigationLinks[5].style.color = "lightskyblue";
} else {
	navigationLinks[0].style.color = "lightskyblue";
}
var Intro = new Array("Hi, I am", "Simon Grischek");
var index = 0;
var length = Intro[0].length;
var row_start = 0;
var content = '';
var row;
function write_introduction(){
    content =  ' ';
    row = Math.max(0, index-20);
    var intro_div = document.getElementById("hello_line");
    while ( row < index ) {
        content += Intro[row++] + '<br />';
    }
    intro_div.innerHTML = content + Intro[index].substring(0, row_start);
    if ( row_start++ == length ) {
        row_start = 0;
        index++;
        if ( index != Intro.length ) {
            length = Intro[index].length;
            setTimeout("write_introduction()", 500);
        }
        } else {
            setTimeout("write_introduction()", 100);
    }
}
write_introduction();
