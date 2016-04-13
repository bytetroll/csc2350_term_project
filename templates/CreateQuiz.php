<article>
    <header>
        <h1>Quiz Creation Wizard</h1>
        <p>Use the sidebar to edit and submit the quiz.</p>
        <table id="QTable" style="margin-left: 25px; width: 600px;" width="30%" border="0">

        </table>
    </header>
</article>

<aside>
    <h3>Quick Actions</h3>
    <p><a href="#" id="OnAddQuestion">Add Question</a></p>
    <p><a onclick="alert(ToJSON())" href="#">Submit</a></p>
</aside>

<div style="visibility: hidden;">
    <table>
        <tr id="QTemplate">
            <td style="padding: 10px; background-color: #F16529;">
                <nobr><input type="text" id="HeaderN$id" style="height: 25px" value="$header"/></nobr>
                <button id="RemoveN$id">x</button>
                <button id="AddN$id">+</button>
            </td>
            <td style="padding: 10px 10px 10px 10px; background-color: #4CAF50;">
                <table id="TN$id" style="width: 230px; margin-left: 25px;" width="30%" border="0">

                </table>
            </td>
        </tr>
        <tr id="ATemplate">
            <td>
                <input type="text" id="AnswerN$idA$aid" style="height: 25px" value="$answer"/>
                <button id="RemoveN$idA$aid">x</button>
            </td>
        </tr>
    </table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>
    String.prototype.replaceAllOccurances = function(search, replacement) {
        var target = this;
        return target.split(search).join(replacement);
    };

    function AddAnswer(ID, Answer)
    {
        // Add Answer
        var IDA = AnswerCount(ID);
        $('#TN' + ID).append("<tr id='N" + ID + "A" + IDA + "'>" + $('#ATemplate').clone().html()
                .replaceAllOccurances("$answer", Answer)
                .replaceAllOccurances("$aid", IDA)
                .replaceAllOccurances("$id", ID) +
            "</tr>");

        // Remove Answer Callback
        $("#RemoveN" + ID + "A" + IDA).click(function () {
            $("#N" + ID + "A" + IDA).remove();
        });
    }

    function AddQuestion(Header, DefaultAnswers)
    {
        var ID = QuestionCount();

        // Insert Question
        $('#QTable').append(
            "<tr id='N" + ID + "' style='border-top: 20px solid #e44d26; height: 120px;'>" +
            $( "#QTemplate" ).clone().html()
                .replaceAllOccurances("$header", Header)
                .replaceAllOccurances("$id", ID) +
            "</tr>");

        // Insert Answers
        $.each(DefaultAnswers, function(Idx, Answer) {
            AddAnswer(ID, Answer);
        });

        // Create Question Remove Callback
        $( "#RemoveN" + ID ).click(function() {
            $("#N" + ID).remove();
        });

        // Add Answer Callback
        $( "#AddN" + ID ).click(function() {
            AddAnswer(ID, "...");
        });
    }

    function ToJSON()
    {
        var PreJSON = [];

        // For each question
        var QCount = QuestionCount();
        for (var i = 0; i < QCount; i++)
        {
            var Answers = [];

            // For each answer
            var k = AnswerCount(i);
            for (var j = 0; j < k; j++)  {
                Answers.push($("#AnswerN" + i + "A" + j).val());
            }

            // Append question
            PreJSON.push([$("#HeaderN" + i).val(), Answers]);
        }

        // Stringify
        return JSON.stringify(PreJSON);
    }

    function QuestionCount()
    {
        return $('#QTable >tbody:last >tr').length;
    }

    function AnswerCount(N)
    {
        return $('#TN' + N + ' >tbody:last >tr').length;
    }

    $( "#OnAddQuestion" ).click(function() {
        AddQuestion("Question", ["True", "False"]);
    });

    $( document ).ready(function() {
        // Add default answer
        AddQuestion("Am I a robot?", ["Yes", "How would I know?"]);
    });
</script>