<?php
$CountPerPage = 10;
$Pages = ceil($QuizCompletedCount / $CountPerPage);
?>

<article>
    <header>
        <h1>User Stats</h1>
        <table style="margin-left: 25px" width="30%" border="0">
            <tr>
                <td>
                    Quizes Created:
                </td>
                <td>
                    <?= $QuizCount; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Quizes Completed:
                </td>
                <td>
                    <?= $QuizCompletedCount; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Quizes Visited:
                </td>
                <td>
                    <?= $QuizVisitedCount; ?>
                </td>
            </tr>
        </table>
        <h2 style="margin-left: 25px; margin-top: 30px;">Completed Quizes:</h2>
        <table  style="margin: auto; width: 400px;">
            <tr>
                <td>
                    <p><?= $QuizCompletedCount ?> Completed Quizes, <?= $Pages ?> Page(s) (<span id="Page">0</span>)</p>
                </td>
                <td>
                    <p style="float: right"><button id="Prev">Prev</button> <button id="Next">Next</button></p>
                </td>
            </tr>
        </table>
        <table id="Quizes" style="margin: auto; width: 400px;">

        </table>
    </header>
</article>

<div hidden>
    <table>
        <tr id="Template">
            <td style="padding: 0px; padding-left: 10px; padding-right: 10px">
                <a><p style="text-align: center">$header, By: $owner [Grade: $grade%]</p></a>
            </td>
        </tr>
    </table>
</div>

<aside>
    <h3>Quick Actions</h3>
    <p><a href="../views/CreateQuiz.php">Create Quiz</a></p>
    <p><a href="../views/DeleteUser.php">Delete User</a></p>
</aside>

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
                url: "../php/Ajax_GetCompletedQuizes.php",
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
                            .replaceAllOccurances("$grade", Quizes[i]["Grade"])
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