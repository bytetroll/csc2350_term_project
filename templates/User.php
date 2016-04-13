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
    </header>
</article>

<aside>
    <h3>Quick Actions</h3>
    <p><a href="../views/CreateQuiz.php">Create Quiz</a></p>
    <p><a href="../views/DeleteUser.php">Delete User</a></p>
</aside>