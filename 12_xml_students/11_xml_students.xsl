<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:template match="/">
		<html>
			<body bgcolor="gold">
				<h3><center>Students</center></h3>
				
				<table border="1" align="center">
					<tr bgcolor="orange">
						<th>Name</th>
						<th>Roll</th>
						<th>Marks</th>
					</tr>

					<xsl:for-each select="student/data">
						<tr bgcolor="#FF9A00">
							<td>
								<xsl:value-of select="name"/>
							</td>
							<td>
								<xsl:value-of select="roll"/>
							</td>
							<td>
								<xsl:value-of select="marks"/>
							</td>
						</tr>
					</xsl:for-each>


				</table>

			</body>
		</html>
	</xsl:template>
</xsl:stylesheet>



