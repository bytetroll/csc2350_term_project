<?php
$CountPerPage = 10;
$Pages = ceil($QuizCount / $CountPerPage);
?>

<article>
    <header>
        <h2>Quizes</h2>
        <div style="margin-left: 25px">
            <table  style="margin: auto; width: 400px;">
                <tr>
                    <td>
                        <p><?= $QuizCount ?> Quizes, <?= $Pages ?> Page(s) (<span id="Page">0</span>)</p>
                    </td>
                    <td>
                        <p style="float: right"><button id="Prev">Prev</button> <button id="Next">Next</button></p>
                    </td>
                </tr>
            </table>
            <table id="Quizes" style="margin: auto; width: 400px;">

            </table>
        </div>
    </header>
</article>

<div style="visibility: hidden;">
    <table>
        <tr id="Template">
            <td style="padding: 0px; padding-left: 10px; padding-right: 10px">
                <a href="ViewQuiz.php?ID=$id"><p style="text-align: center">$header, By: $owner, [$id]</p></a>
            </td>
        </tr>
    </table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>
    String.prototype.replaceAllOccurances = function (search, replacement) {
        var target = this;
        return target.split(search).join(replacement);
    };

    function Refresh()
    {
        $("#Quizes").empty();
        $.ajax({
                method: "POST",
                url: "../php/Ajax_GetQuizes.php",
                data: {start: PageIndex * <?= $CountPerPage  ?>, limit: <?= $CountPerPage ?>}
            })
            .done(function (Data) {
                var Quizes = JSON.parse(Data);
                for (var i = 0; i < Quizes.length; i++)
                {
                    // Insert Quiz Entry
                    $('#Quizes').append(
                        "<tr style=' border-top: 20px solid #e44d26; background-color: #4CAF50;'>" +
                        $("#Template").clone().html()
                            .replaceAllOccurances("$header", Quizes[i]["Name"])
                            .replaceAllOccurances("$id", Quizes[i]["ID"])
                            .replaceAllOccurances("$owner", Quizes[i]["UserID"]) +
                        "</tr>");
                }
                $("#Page").html(PageIndex + 1);
            });
    }

    var PageIndex = 0;
    $(document).ready(function () {
        Refresh();

        // Bind Events
        $("#Prev").click(function () {
            PageIndex--;
            if (PageIndex < 0)
                PageIndex = 0;
            Refresh();
        });
        $("#Next").click(function () {
            PageIndex++;
            if (PageIndex >= <?= $Pages ?> - 1)
                PageIndex = <?= $Pages ?> - 1;
            Refresh();
        });
    });
</script>