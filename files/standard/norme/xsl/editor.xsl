<?xml version='1.0'?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">

<xsl:output method='html'/>

<xsl:template match="/">

	<xsl:apply-templates select="*"/>

</xsl:template>

	<xsl:template match="kmehrmessage">
		<xsl:apply-templates select="*"/>
	</xsl:template>

	<xsl:template match="header">
	</xsl:template>
	
	<xsl:template match="folder">
		<xsl:apply-templates select="transaction/text/node()"/>
	</xsl:template>

	<xsl:template match="*" priority="-1">
		<xsl:choose>
			<xsl:when test="namespace-uri()=''">
				<!-- assume if namespace empty, namespace = xhtml -->
				<xsl:element name="{name()}">
					<xsl:apply-templates select="@*|node()"/>
				</xsl:element>
			</xsl:when>
			<xsl:otherwise>
				<xsl:element name="{local-name()}">
					<xsl:apply-templates select="@*|node()"/>
				</xsl:element>
			</xsl:otherwise>
		</xsl:choose>
	</xsl:template>

<xsl:template match="@*|comment()">
		<xsl:copy/>
	</xsl:template> 

</xsl:stylesheet>





