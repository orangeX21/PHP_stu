<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>添加出版社</title>
    <link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
    <center>
        <?php include("top.php"); ?>
        <table width="799" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td align="center" valign="middle">
                    <form name="form1" method="post" action="addPublisher_ok.php">
                        <table width="100%" height="200" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td width="30%" class="c_td">&nbsp;</td>
                                <td width="10%" class="c_td">&nbsp;</td>
                                <td width="30%" class="c_td">&nbsp;</td>
                                <td width="30%" class="c_td">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="c_td">&nbsp;</td>
                                <td align="right" valign="middle" class="c_td">出版社名称：</td>
                                <td valign="middle" class="c_td"><input type="text" name="publisherName" class="text"></td>
                                <td class="c_td">&nbsp;</td>
                            </tr>
                            <tr align="center" valign="middle">
                                <td class="c_td">&nbsp;</td>
                                <td colspan="2" class="c_td">
                                    <input type="submit" name="Submit" value="添加">
                                    <input type="reset" name="reset" value="重置">
                                </td>
                                <td class="c_td">&nbsp;</td>
                            </tr>
                        </table>
                    </form>
                </td>
            </tr>
        </table>
        <?php include("bottom.html"); ?>
    </center>
</body>
</html>