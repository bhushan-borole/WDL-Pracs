<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:template match="/">
        <html>
        <body>
            <h2>My Employees</h2>

        <table>
            <tr>
                <th>Name</th>
                <th>Post</th>
                <th>Age</th>
            </tr>
            <xsl:for-each select="Emp_Details/Employee">
                <tr>
                    <td><xsl:value-of select="name"/></td>
                    <td><xsl:value-of select="post"/></td>
                    <td><xsl:value-of select="age"/></td>
                </tr>
            </xsl:for-each>
        </table>
        </body>
        </html>
    </xsl:template>
</xsl:stylesheet>