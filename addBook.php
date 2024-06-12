
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>添加图书</title>
        <link rel="stylesheet" type="text/css" href="mystyle.css">      
    </head>
    <body>
        <center> 
	<!-- 此处需要包含top.php文件 -->
        <?php include("top.php");   
     
            <table width="799" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td align="center" valign="middle">
                        <form name="form1" method="post" action="addBook_ok.php">
                            <table width="100%" height="200"  border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="30%" class="c_td">&nbsp;</td>
                                    <td width="10%" class="c_td">&nbsp;</td>
                                    <td width="30%" class="c_td">&nbsp;</td>
                                    <td width="30%" class="c_td">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="c_td">&nbsp;</td>
                                    <td align="right" valign="middle" class="c_td">书  名：</td>
                                    <td  valign="middle" class="c_td"><input type="text" name="title" class="text"></td>
                                    <td class="c_td">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="c_td">&nbsp;</td>
                                    <td align="right" valign="middle" class="c_td">作  者：</td>
                                    <td valign="middle" class="c_td"><input type="text" name="author" class="text"></td>
                                    <td class="c_td">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="c_td">&nbsp;</td>
                                    <td align="right" valign="middle" class="c_td">价  格：</td>
                                    <td valign="middle" class="c_td"><input type="text" name="price" class="text"></td>
                                    <td class="c_td">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="c_td">&nbsp;</td>
                                    <td align="right" valign="middle" class="c_td">出版社：</td>
                                    <td valign="middle" class="c_td">
                                        <select name="publisher" class="text">
                                            <option value='1'>*********</option><option value='2'>*********</option><option value='3'>*********</option><option value='4'>*********</option><option value='5'>*********</option>                     
                                        </select>
                                    </td>
                                    <td class="c_td">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="c_td">&nbsp;</td>
                                    <td align="right" valign="middle" class="c_td">出版时间：</td>
                                    <td align="left" valign="middle" class="c_td">
                                        <input type="text" name="publishDate" id="publishDate" class="text"></td>
                                    <td class="c_td">&nbsp;</td>
                                </tr>                               
                                <tr align="center" valign="middle">
                                    <td class="c_td">&nbsp;</td>
                                    <td colspan="2" class="c_td">
                                        <input type="hidden" name="action" value="insert">
                                        <input type="submit" name="Submit" value="添加">
                                        <input type="reset" name="reset" value="重置"></td>
                                    <td class="c_td">&nbsp;</td>
                                </tr>
                            </table>
                        </form>
                    </td>
                </tr>
            </table>
	<!-- 此处需要包含bottom.html文件 -->
        <?php include("bottom.html");  

           </center>
    </body>
</html>
