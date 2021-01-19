// Essaie 1
// $(document).ready(function () {
//     $('#rechercheOeuvre').keyup(function () {
//         var oeuvre = $(this).val();
//
//         if (oeuvre != "") {
//             $.ajax({
//                 type: 'POST',
//                 url: '',
//                 data: 'libelle=' + encodeURIComponent(oeuvre),
//                 success: function (data) {
//                     if (data != "") {
//                         //console.log(oeuvre);
//                         $('#result-recherche').append(data);
//                     } else {
//                         document.getElementById('result-recherche').innerHTML = "<div style='font-size: 20px; text-align: center; margin-top: 10px'>Aucun résultat</div>"
//                     }
//                 }
//             });
//         }
//     });
// });

//Getting value from "ajax.php".
// Essaie 2
// function fill(Value) {
//     //Assigning value to "search" div in "search.php" file.
//     $('#rechercheOeuvre').val(Value);
//     //Hiding "display" div in "search.php" file.
//     $('#result-recherche').hide();
// }
//
// $(document).ready(function () {
//     //On pressing a key on "Search box" in "search.php" file. This function will be called.
//     $("#rechercheOeuvre").keyup(function () {
//         //Assigning search box value to javascript variable named as "name".
//         var name = $('#rechercheOeuvre').val();
//         //Validating, if "name" is empty.
//         if (name == "") {
//             //Assigning empty value to "display" div in "search.php" file.
//             $("#result-recherche").html("");
//         }
//         //If name is not empty.
//         else {
//             //AJAX is called.
//             $.ajax({
//                 //AJAX type is "Post".
//                 type: "POST",
//                 //Data will be sent to "ajax.php".
//                 url: "recherche.php",
//                 //Data, that will be sent to "ajax.php".
//                 data: {
//                     //Assigning value of "name" into "search" variable.
//                     search: name
//                 },
//                 //If result found, this funtion will be called.
//                 success: function (html) {
//                     //Assigning result to "display" div in "search.php" file.
//                     $("#result-recherche").html(html).show();
//                 }
//             });
//         }
//     });
// });

// Essaie 3
