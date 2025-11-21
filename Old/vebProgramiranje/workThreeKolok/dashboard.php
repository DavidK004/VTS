<?php
session_start();
if (!isset($_SESSION['id_worker'])) {
    header('Location: index.php');
    exit;
}
$is_admin = $_SESSION['is_admin'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Dashboard</title>
</head>
<body>

<h1>Welcome to Dashboard</h1>

<?php if (!$is_admin): ?>

<button id="btnMyData">My Data</button>
<button id="btnPositions">Positions</button>
<button id="btnAddComment">Add Comment</button>
<button id="btnLogout">Logout</button>

<div id="content"></div>

<script>
function ajaxGet(url, callback) {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', url);
    xhr.responseType = 'json';
    xhr.onload = function () {
        if (xhr.status === 200) {
            callback(null, xhr.response);
        } else {
            callback('Request failed. Status: ' + xhr.status);
        }
    };
    xhr.onerror = function () {
        callback('Network error');
    };
    xhr.send();
}

function ajaxPost(url, data, callback) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.responseType = 'json';
    xhr.onload = function () {
        if (xhr.status === 200) {
            callback(null, xhr.response);
        } else {
            callback('Request failed. Status: ' + xhr.status);
        }
    };
    xhr.onerror = function () {
        callback('Network error');
    };
    const params = Object.keys(data).map(k => encodeURIComponent(k) + '=' + encodeURIComponent(data[k])).join('&');
    xhr.send(params);
}

// My Data button
document.getElementById('btnMyData').addEventListener('click', function() {
    ajaxGet('myDataAjax.php', function(err, data) {
        if (err) {
            document.getElementById('content').innerHTML = '<p>' + err + '</p>';
        } else if (data.error) {
            document.getElementById('content').innerHTML = '<p>' + data.error + '</p>';
        } else {
            let html = `<h3>Your Info</h3>
            <p>Name: ${data.name}</p>
            <p>Email: ${data.email}</p>
            <p>Username: ${data.username}</p>
            <p>Position: ${data.position_name}</p>
            <p>Salary: ${data.salary}</p>`;
            document.getElementById('content').innerHTML = html;
        }
    });
});

// Positions button
document.getElementById('btnPositions').addEventListener('click', function() {
    ajaxGet('positionsAjax.php', function(err, data) {
        if (err) {
            document.getElementById('content').innerHTML = '<p>' + err + '</p>';
        } else if (data.error) {
            document.getElementById('content').innerHTML = '<p>' + data.error + '</p>';
        } else {
            let html = '<h3>Positions</h3><table border="1"><tr><th>ID</th><th>Name</th></tr>';
    data.forEach(function(pos) {
        html += `<tr><td>${pos.id_position}</td><td>${pos.name}</td></tr>`;
    });
    html += '</table>';
    document.getElementById('content').innerHTML = html;
        }
    });
});

// Add Comment button
document.getElementById('btnAddComment').addEventListener('click', function() {
    let formHtml = `
    <h3>Add Comment</h3>
    <form id="addCommentForm">
    <textarea id="comment" name="comment" rows="4" cols="50"></textarea><br>
    <button type="submit">Submit</button>
    <button type="reset">Reset</button>
    </form>
    <div id="commentMsg"></div>
    `;
    document.getElementById('content').innerHTML = formHtml;

    document.getElementById('addCommentForm').addEventListener('submit', function(e) {
        e.preventDefault();
        let comment = document.getElementById('comment').value.trim();
        let msgDiv = document.getElementById('commentMsg');
        if (comment.length < 10) {
            msgDiv.textContent = 'Comment must be at least 10 characters long.';
    return;
        }
        ajaxPost('addComment.php', { comment: comment }, function(err, res) {
            if (err) {
                msgDiv.textContent = 'Error: ' + err;
            } else if (res.success) {
                msgDiv.textContent = 'Comment added successfully!';
        document.getElementById('addCommentForm').reset();
            } else {
                msgDiv.textContent = res.error || 'Error adding comment.';
            }
        });
    });
});

// Logout button
document.getElementById('btnLogout').addEventListener('click', function() {
    window.location.href = 'logout.php';
});
</script>

<?php else: ?>

<button id="btnComments">Comments</button>
<button id="btnLogout">Logout</button>

<script>
document.getElementById('btnComments').addEventListener('click', function() {
    window.location.href = 'allComments.php';
});
document.getElementById('btnLogout').addEventListener('click', function() {
    window.location.href = 'logout.php';
});
</script>

<?php endif; ?>

</body>
</html>
