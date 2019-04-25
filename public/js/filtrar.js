function filtrarPor(){
    var genres = document.getElementById("genre");
    var genreSelected = genres.options[genres.selectedIndex].value;

    var orderby = document.getElementById("orderby");
    var orderbySelected = orderby.options[orderby.selectedIndex].value;

    window.location.href = "/home/"+genreSelected+"/"+orderbySelected;
}