var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var myObj = JSON.parse(this.responseText);
        document.getElementById("demo").src = myObj["image_uris"].large;
    }
};
xmlhttp.open("GET", "https://api.scryfall.com/cards/named?fuzzy=swamp", true);
xmlhttp.send();
