<?php
require_once("init_pdo.php");
function get_users($db){
    $sql = "SELECT * FROM USER";
    $exe = $db->query($sql);
    $res = $exe->fetchAll(PDO::FETCH_OBJ);
    return $res;
}

function create_user($db, $name, $email) {
    $sql = "INSERT INTO user (name, email) VALUES (?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->execute([$name, $email]);

    return $db->lastInsertId();
}

function update_user($db, $id, $name, $email) {
    $sql = "UPDATE user SET name = ?, email = ? WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$name, $email, $id]);

    return $stmt->rowCount();
}

function delete_user($db, $id) {
    $sql = "DELETE FROM user WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$id]);

    return $stmt->rowCount();
}

function setHeaders() {
    // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Access-Control-Allow-Origin
    header("Access-Control-Allow-Origin: *");
    header('Content-type: application/json; charset=utf-8');
}
// ==============
// Responses
// ==============
switch($_SERVER["REQUEST_METHOD"]) {
    case 'GET':
    $result = get_users($pdo);
    setHeaders();
    exit(json_encode($result));
    case 'POST':
        $post_data = json_decode(file_get_contents("php://input"), true);
        if (isset($post_data['name']) && isset($post_data['email'])) {
            $newUserId = create_user($pdo, $post_data['name'], $post_data['email']);
            if ($newUserId) {
                setHeaders();
                http_response_code(201);
                exit(json_encode(['id' => $newUserId]));
            } else {
                setHeaders();
                http_response_code(500);
                exit(json_encode(['error' => 'Failed to create user.']));
            }
        } else {
            setHeaders();
            http_response_code(400);
            exit(json_encode(['error' => 'Missing name or email in the request.']));
        }
            case 'PUT':
            $put_data = json_decode(file_get_contents("php://input"), true);
            if (isset($put_data['id']) && isset($put_data['name']) && isset($put_data['email'])) {
            $updatedRows = update_user($pdo, $put_data['id'], $put_data['name'], $put_data['email']);
            if ($updatedRows > 0) {
                setHeaders();
                http_response_code(200);
                exit(json_encode(['message' => 'User updated successfully.']));
            } else {
                setHeaders();
                http_response_code(500);
                exit(json_encode(['error' => 'Failed to update user.']));
            }
            } else {
                setHeaders();
            http_response_code(400);
            exit(json_encode(['error' => 'Missing id, name, or email in the request.']));
        }
    case 'DELETE':
        $delete_data = json_decode(file_get_contents("php://input"), true);
        if (isset($delete_data['id'])) {
            $deletedRows = delete_user($pdo, $delete_data['id']);
            if ($deletedRows > 0) {
                setHeaders();
                http_response_code(204); 
                exit();
            } else {
                setHeaders();
                http_response_code(500);
                exit(json_encode(['error' => 'Failed to delete user.']));
            }
        } else {
            setHeaders();
            http_response_code(400);
            exit(json_encode(['error' => 'Missing id in the request.']));
        }
}
?>
