
$(document).ready(function(){
            $('.header').height($(window).height());
        });
function show() {

    var questions = document.tab.length;
 

    for (i = 0; i < questions; i++) {

        document.tab['q'+i].value;

        if (answers[i] == null || answers[i] == '') {
            window.alert("You need to answer question " + (i + 1));
            return false;
        }
        else {
               window.alert("VOus voulez supprimer l'item " + (i + 1));

        }

    }
    window.alert(score);
}