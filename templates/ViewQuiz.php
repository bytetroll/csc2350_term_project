<article>
    <header>
        <h2>Quiz: <?= $Name ?></h2>
        <table id="QTable" style="margin-top:10px; margin-left: 25px; width: 600px;" width="30%" border="0">

        </table>
    </header>
</article>

<aside>
    <h3>Quick Actions</h3>
    <form id="target" method="post" action="../php/complete_quiz.php">
        <input type="text" id="QuizData" name="QuizData" hidden/>
        <input type="text" id="QuizID" name="QuizID" value="<?= $ID ?>" hidden/>
        <p><a onclick="$('#QuizData').val(ToJSON()); $('#target').submit();" href="#">Submit</a></p>
    </form>
</aside>

<div style="visibility: hidden;">
    <table>
        <tr id="QTemplate">
            <td style="padding: 10px; background-color: #F16529;">
                <h4 style="text-align: center">$header</h4>
            </td>
            <td style="padding: 10px 10px 10px 10px; background-color: #4CAF50;">
                <table id="TN$id" style="width: 230px; margin-left: 25px;" width="30%" border="0">

                </table>
            </td>
        </tr>
        <tr id="ATemplate">
            <td>
                <input type="radio" name="RN$id" id="RN$id" value="$aid" checked> $answer</input>
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

    var Count = 0;
    function ToJSON() {
        var PreJSON = [];

        // For each question
        for (var i = 0; i < Count; i++) {
            PreJSON.push($('input[name=RN' + i + ']:checked').val());
        }

        // Stringify
        return JSON.stringify(PreJSON);
    }

    $(document).ready(function () {
        var Data = JSON.parse('<?= $Data ?>');
        Count = Data.length;
        for (var i = 0; i < Data.length; i++)
        {
            // Add Question
            $('#QTable').append(
                "<tr id='N" + i + "' style='border-top: 20px solid #e44d26; height: 120px;'>" +
                $("#QTemplate").clone().html()
                    .replaceAllOccurances("$header", Data[i][0])
                    .replaceAllOccurances("$id", i) +
                "</tr>");

            // Add Answers
            for (var j = 0; j < Data[i][1].length; j++)
            {
                $('#TN' + i).append("<tr>" + $('#ATemplate').clone().html()
                        .replaceAllOccurances("$answer", Data[i][1][j])
                        .replaceAllOccurances("$aid", j)
                        .replaceAllOccurances("$id", i) +
                    "</tr>");
            }
        }
    });
</script>
