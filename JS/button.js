function tablica(){
    document.getElementById('wynik').innerHTML = `
    echo '<tr>';
        echo '<th>Imie</th>';
        echo '<th>Nazwa instytucji</th>';
    echo '</tr>';
    while ($wynik2 = mysqli_fetrch_row(wynik1){
        echo '<tr>';
            echo '<td class="podswietlanie">$wynik2[0]</td>';
            echo '<td class="podswietlanie">$wynik2[1]</td>';
    })`;
}