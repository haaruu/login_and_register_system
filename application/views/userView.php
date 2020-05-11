<?php require_once('header.php');

foreach ($data1 as $data) {
    echo '<div class="hello">' .
            '<a href="/user/logout" class="logout">' . 'Logout' . '</a>'. 
            '<h2>' . 'Hello, ' . $data['name'] . '!' . ' :)' . '</h2>' .
	    '</div>'; 
}

?>
<div class="user-info">
    <div class="manage-attr">
        <div class="edit-form">
            <h3>Edit form</h3>
            <form action="/user/updateAttr" method="post">
            <?php 
            foreach ($data1 as $data) {
                echo '<p>' .
                        'Name: ' . $data['name'] .
                    '</p>' .
                    '<p>' .
                        'Email: ' . $data['email']  .
                    '</p>';
                }
            ?>
            <table>
                <tr>
                    <th>Attribute</th>
                    <th>Value</th>
                    <th>Delete</th>
                </tr>
                <?php
                foreach ($data2 as $data) {
                    echo '<tr>' .
                            '<td>' . '<input class="attr-input" type="text" name="attrName['.$data['attrId'].']" id="attr_id" value="' . $data['name'] . '">' . ':' . '</td>' .
                            '<td>' . '<input class="attr-input" type="text" name="attrVal['.$data['attrId'].']" id="attrval_id" value="' . $data['attrValue'] . '">' . '</td>' . 
                            '<td>' . '<input type="checkbox" name="deleteId[]" id="del_id" value="' . $data['attrId'] . '">' .
                        '</tr>' . 
                        '<input type="hidden" name="hiddenId[]" id="hid_id" value="' . $data['attrId'] . '">';
                    }
            ?>
                <tr>
                    <td></td>
                    <td><input type="submit" name="update" value="Update" class="btn btn-active"></td>
                    <td><input type="submit" name="delete" value="Delete selected" class="btn btn-active"></td>
                </tr>
            </table>
            </form>
        </div>
        <div class="add-attr">
            <h3>Add attributes</h3>
            <form name="formLogin" method="post" id="loginForm" action="/user/addattr">
			<p>
                <label for="attribute">Attribute: </label><br>
                <?php if(!empty($data3)): echo $data3; endif; ?> <br>
				<input class="edit-input" type="text" id="attribute" name="attribute"><br>
			</p>
			<p>
                <label for="attrValue">Value: </label><br>
                <?php if(!empty($data4)): echo $data4; endif; ?> <br>
				<input class="edit-input" type="text" id="attrValue" name="attrValue"><br>
            </p>
			<input class="btn btn-inactve" type="submit" name="add" value="Add">
		</form>
        </div>
    </div>
</div>
<?php require_once('footer.php');
