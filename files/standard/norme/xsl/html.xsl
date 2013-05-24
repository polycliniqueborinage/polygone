<?xml version='1.0'?>
	<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">

	<xsl:output method='html'/>

	<xsl:template match="/">
	
	  	<xsl:variable name="sender_firstname1"><xsl:value-of select="//header/recipient/hcparty[1]/firstname"/></xsl:variable>
  		<xsl:variable name="sender_familyname1"><xsl:value-of select="//header/recipient/hcparty[1]/familyname"/> </xsl:variable>
  		<xsl:variable name="sender_country1"><xsl:value-of select="//header/recipient/hcparty[1]/address/country"/></xsl:variable>
  		<xsl:variable name="sender_zip1"><xsl:value-of select="//header/recipient/hcparty[1]/address/zip"/></xsl:variable>
  		<xsl:variable name="sender_city1"><xsl:value-of select="//header/recipient/hcparty[1]/address/city"/></xsl:variable>
  		<xsl:variable name="sender_street1"><xsl:value-of select="//header/recipient/hcparty[1]/address/street"/></xsl:variable>
  		<xsl:variable name="sender_speciality1"><xsl:value-of select="//header/recipient/hcparty[1]/cd"/></xsl:variable>
  		<xsl:variable name="sender_speciality1_format">
  			<xsl:call-template name="getSpeciality">
        		<xsl:with-param name="speciality">
        			<xsl:value-of select="$sender_speciality1"/>
        		</xsl:with-param>
    		</xsl:call-template>
  		</xsl:variable>

	  	<xsl:variable name="sender_firstname2"><xsl:value-of select="//header/recipient/hcparty[2]/firstname"/></xsl:variable>
  		<xsl:variable name="sender_familyname2"><xsl:value-of select="//header/recipient/hcparty[2]/familyname"/> </xsl:variable>
  		<xsl:variable name="sender_country2"><xsl:value-of select="//header/recipient/hcparty[2]/address/country"/></xsl:variable>
  		<xsl:variable name="sender_zip2"><xsl:value-of select="//header/recipient/hcparty[2]/address/zip"/></xsl:variable>
  		<xsl:variable name="sender_city2"><xsl:value-of select="//header/recipient/hcparty[2]/address/city"/></xsl:variable>
  		<xsl:variable name="sender_street2"><xsl:value-of select="//header/recipient/hcparty[2]/address/street"/></xsl:variable>
  		<xsl:variable name="sender_speciality2"><xsl:value-of select="//header/recipient/hcparty[2]/cd"/></xsl:variable>
  		<xsl:variable name="sender_speciality2_format">
  			<xsl:call-template name="getSpeciality">
        		<xsl:with-param name="speciality">
        			<xsl:value-of select="$sender_speciality2"/>
        		</xsl:with-param>
    		</xsl:call-template>
  		</xsl:variable>
  		
	  	<xsl:variable name="sender_firstname3"><xsl:value-of select="//header/recipient/hcparty[3]/firstname"/></xsl:variable>
  		<xsl:variable name="sender_familyname3"><xsl:value-of select="//header/recipient/hcparty[3]/familyname"/> </xsl:variable>
  		<xsl:variable name="sender_country3"><xsl:value-of select="//header/recipient/hcparty[3]/address/country"/></xsl:variable>
  		<xsl:variable name="sender_zip3"><xsl:value-of select="//header/recipient/hcparty[3]/address/zip"/></xsl:variable>
  		<xsl:variable name="sender_city3"><xsl:value-of select="//header/recipient/hcparty[3]/address/city"/></xsl:variable>
  		<xsl:variable name="sender_street3"><xsl:value-of select="//header/recipient/hcparty[3]/address/street"/></xsl:variable>
  		<xsl:variable name="sender_speciality3"><xsl:value-of select="//header/recipient/hcparty[3]/cd"/></xsl:variable>
  		<xsl:variable name="sender_speciality3_format">
  			<xsl:call-template name="getSpeciality">
        		<xsl:with-param name="speciality">
        			<xsl:value-of select="$sender_speciality3"/>
        		</xsl:with-param>
    		</xsl:call-template>
  		</xsl:variable>
  		
	  	<xsl:variable name="sender_firstname4"><xsl:value-of select="//header/recipient/hcparty[4]/firstname"/></xsl:variable>
  		<xsl:variable name="sender_familyname4"><xsl:value-of select="//header/recipient/hcparty[4]/familyname"/> </xsl:variable>
  		<xsl:variable name="sender_country4"><xsl:value-of select="//header/recipient/hcparty[4]/address/country"/></xsl:variable>
  		<xsl:variable name="sender_zip4"><xsl:value-of select="//header/recipient/hcparty[4]/address/zip"/></xsl:variable>
  		<xsl:variable name="sender_city4"><xsl:value-of select="//header/recipient/hcparty[4]/address/city"/></xsl:variable>
  		<xsl:variable name="sender_street4"><xsl:value-of select="//header/recipient/hcparty[4]/address/street"/></xsl:variable>
  		<xsl:variable name="sender_speciality4"><xsl:value-of select="//header/recipient/hcparty[4]/cd"/></xsl:variable>
  		<xsl:variable name="sender_speciality4_format">
  			<xsl:call-template name="getSpeciality">
        		<xsl:with-param name="speciality">
        			<xsl:value-of select="$sender_speciality4"/>
        		</xsl:with-param>
    		</xsl:call-template>
  		</xsl:variable>
  		
	  	<xsl:variable name="sender_firstname5"><xsl:value-of select="//header/recipient/hcparty[5]/firstname"/></xsl:variable>
  		<xsl:variable name="sender_familyname5"><xsl:value-of select="//header/recipient/hcparty[5]/familyname"/> </xsl:variable>
  		<xsl:variable name="sender_country5"><xsl:value-of select="//header/recipient/hcparty[5]/address/country"/></xsl:variable>
  		<xsl:variable name="sender_zip5"><xsl:value-of select="//header/recipient/hcparty[5]/address/zip"/></xsl:variable>
  		<xsl:variable name="sender_city5"><xsl:value-of select="//header/recipient/hcparty[5]/address/city"/></xsl:variable>
  		<xsl:variable name="sender_street5"><xsl:value-of select="//header/recipient/hcparty[5]/address/street"/></xsl:variable>
  		<xsl:variable name="sender_speciality5"><xsl:value-of select="//header/recipient/hcparty[5]/cd"/></xsl:variable>
  		<xsl:variable name="sender_speciality5_format">
  			<xsl:call-template name="getSpeciality">
        		<xsl:with-param name="speciality">
        			<xsl:value-of select="$sender_speciality5"/>
        		</xsl:with-param>
    		</xsl:call-template>
  		</xsl:variable>
  		

  		<!-- PATIENT -->
  		<xsl:variable name="patient_firstname">
  			<xsl:value-of select="//folder/patient/firstname"/>
  		</xsl:variable>
  
		<xsl:variable name="patient_familyname">
  			<xsl:value-of select="//folder/patient/familyname"/>
  		</xsl:variable>
  
		<xsl:variable name="patient_sex">
  			<xsl:value-of select="//folder/patient/sex"/>
  		</xsl:variable>

  		<xsl:variable name="patient_birthdate">
  			<xsl:value-of select="//folder/patient/birthdate/date"/>
  		</xsl:variable>

  		<xsl:variable name="patient_zip">
  			<xsl:value-of select="//folder/patient/address/zip"/>
  		</xsl:variable>

  		<xsl:variable name="patient_city">
  			<xsl:value-of select="//folder/patient/address/city"/>
  		</xsl:variable>

  		<xsl:variable name="patient_street">
  			<xsl:value-of select="//folder/patient/address/street"/>
  		</xsl:variable>
  		
  		<xsl:variable name="patient_birthdate_format">
  			<xsl:call-template name="formatDate">
        		<xsl:with-param name="DateTime">
        			<xsl:value-of select="$patient_birthdate"/>
        		</xsl:with-param>
    		</xsl:call-template>
  		</xsl:variable>

  		<xsl:variable name="patient_sex_format">
  			<xsl:call-template name="getSex">
        		<xsl:with-param name="sex">
        		<xsl:value-of select="$patient_sex"/>
        		</xsl:with-param>
        	</xsl:call-template>
  		</xsl:variable>
  		
  		<!--  USER -->
		<xsl:variable name="user_firstname">
  			<xsl:value-of select="//folder/transaction/author/hcparty/firstname"/>
  		</xsl:variable>
 
  		<xsl:variable name="user_familyname">
  			<xsl:value-of select="//folder/transaction/author/hcparty/familyname"/>
  		</xsl:variable>

  		<xsl:variable name="user_inami">
  			<xsl:value-of select="//folder/transaction/author/hcparty/id"/>
  		</xsl:variable>
  
  		<xsl:variable name="user_speciality">
  			<xsl:value-of select="//folder/transaction/author/hcparty/cd"/>
  		</xsl:variable>

  		<xsl:variable name="user_speciality_format">
  			<xsl:call-template name="getSpeciality">
        		<xsl:with-param name="speciality">
        			<xsl:value-of select="$user_speciality"/>
        		</xsl:with-param>
    		</xsl:call-template>
  		</xsl:variable>

		<!-- PROTOCOL -->
  		<xsl:variable name="protocol_date">
  			<xsl:copy-of select="//folder/transaction/date/node()"/>
  		</xsl:variable>

  		<xsl:variable name="rapport_date">
  			<xsl:copy-of select="//header/date/node()"/>
  		</xsl:variable>

  		<xsl:variable name="rapport_time">
  			<xsl:copy-of select="//header/time/node()"/>
  		</xsl:variable>

  		<xsl:variable name="protocol_date_format">
  			<xsl:call-template name="formatDate">
        		<xsl:with-param name="DateTime">
        			<xsl:value-of select="$protocol_date"/>
        		</xsl:with-param>
    		</xsl:call-template>
  		</xsl:variable>

  		<xsl:variable name="rapport_date_format">
  			<xsl:call-template name="formatDate">
        		<xsl:with-param name="DateTime">
        			<xsl:value-of select="$rapport_date"/>
        		</xsl:with-param>
    		</xsl:call-template>
  		</xsl:variable>

  		
		<div class="protocol">
		 
			<h3>
		 		<xsl:value-of select="concat('Consultation du ', $protocol_date_format)"/>
			</h3>
		 	
			<xsl:if test="$sender_familyname1 !=''">
			 	<h3>
			 	A l'attention du <xsl:value-of select="concat(' Docteur ', $sender_familyname1,' ',$sender_firstname1)"/>
				</h3>
				<xsl:value-of select="$sender_speciality1_format"/>
	    		<br/>
				<xsl:value-of select="$sender_street1"/>
	    		<br/>
	    		<xsl:value-of select="concat($sender_zip1,' ',$sender_city1)"/>
				<br/><br/>
			</xsl:if>

			<xsl:if test="$sender_familyname2 !=''">
			 	<h3>
			 	A l'attention du <xsl:value-of select="concat(' Docteur ', $sender_familyname2,' ',$sender_firstname2)"/>
				</h3>
				<xsl:value-of select="$sender_speciality2_format"/>
	    		<br/>
				<xsl:value-of select="$sender_street2"/>
	    		<br/>
	    		<xsl:value-of select="concat($sender_zip2,' ',$sender_city2)"/>
				<br/><br/>
			</xsl:if>
	
			<xsl:if test="$sender_familyname3 !=''">
			 	<h3>
			 	A l'attention du <xsl:value-of select="concat(' Docteur ', $sender_familyname3,' ',$sender_firstname3)"/>
				</h3>
				<xsl:value-of select="$sender_speciality3_format"/>
	    		<br/>
				<xsl:value-of select="$sender_street3"/>
	    		<br/>
	    		<xsl:value-of select="concat($sender_zip3,' ',$sender_city3)"/>
				<br/><br/>
			</xsl:if>
	
			<xsl:if test="$sender_familyname4 !=''">
			 	<h3>
			 	A l'attention du <xsl:value-of select="concat(' Docteur ', $sender_familyname4,' ',$sender_firstname4)"/>
				</h3>
				<xsl:value-of select="$sender_speciality4_format"/>
	    		<br/>
				<xsl:value-of select="$sender_street4"/>
	    		<br/>
	    		<xsl:value-of select="concat($sender_zip4,' ',$sender_city4)"/>
				<br/><br/>
			</xsl:if>

			<xsl:if test="$sender_familyname5 !=''">
			 	<h3>
			 	A l'attention du <xsl:value-of select="concat(' Docteur ', $sender_familyname5,' ',$sender_firstname5)"/>
				</h3>
				<xsl:value-of select="$sender_speciality5_format"/>
	    		<br/>
				<xsl:value-of select="$sender_street5"/>
	    		<br/>
	    		<xsl:value-of select="concat($sender_zip5,' ',$sender_city5)"/>
				<br/><br/>
			</xsl:if>

		 	<h3>
			Concerne : 
				<xsl:value-of select="concat($patient_sex_format,' ',$patient_firstname,' ',$patient_familyname,', né le ',$patient_birthdate_format)"/>
			</h3>
			<xsl:value-of select="$patient_street"/>
    		<br/>
    		<xsl:value-of select="concat($patient_zip,' ',$patient_city)"/>
			<br/><br/><br/>
			
			<xsl:apply-templates select="*"/>
	
			<br/>
			<br/>
			
    		<h3>
        		<xsl:value-of select="concat('Docteur ', $user_familyname,' ',$user_firstname)"/>
    		</h3>
        	<xsl:value-of select="$user_speciality_format"/>
        	<br/>
        	Numéro INAMI : <xsl:value-of select="$user_inami"/>
        	
        	<h5>
        		<xsl:value-of select="concat('Rapport encodé le ', $rapport_date,' à ',$rapport_time,' à la Nouvelle Polyclinique du Borinage')"/>
    		</h5>
	
		</div>

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


	<xsl:template name="getSpeciality">
    	<xsl:param name="speciality"/>
    		<xsl:choose>
  				<xsl:when test="$speciality = 'deptanesthesiology'">Anesthésiste</xsl:when>
  				<xsl:when test="$speciality = 'deptbacteriology'">Bactériologue</xsl:when>
  				<xsl:when test="$speciality = 'deptcardiology'">Cardiologue</xsl:when>
  				<xsl:when test="$speciality = 'deptdermatology'">Dermatologue</xsl:when>
  				<xsl:when test="$speciality = 'deptdietetics'">Diététicien</xsl:when>
  				<xsl:when test="$speciality = 'deptgastroenterology'">Gastro-entérologue</xsl:when>
  				<xsl:when test="$speciality = 'deptgeneralpractice'">Médecin Généraliste</xsl:when>
  				<xsl:when test="$speciality = 'deptgenetics'">Généticiens</xsl:when>
  				<xsl:when test="$speciality = 'deptgeriatry'">Gériatrie</xsl:when>
  				<xsl:when test="$speciality = 'deptgynecology'">Gynécologue</xsl:when>
  				<xsl:when test="$speciality = 'deptkinesitherapy'">Kinésitherapeute</xsl:when>
  				<xsl:when test="$speciality = 'deptlaboratory'">Laboratoire</xsl:when>
  				<xsl:when test="$speciality = 'deptneurology'">Neurologue</xsl:when>
  				<xsl:when test="$speciality = 'deptnte'">O.R.L.</xsl:when>
  				<xsl:when test="$speciality = 'deptoncology'">Oncologye</xsl:when>
  				<xsl:when test="$speciality = 'deptpediatry'">Pédiatre</xsl:when>
  				<xsl:when test="$speciality = 'deptpharmacy'">Pharmacien</xsl:when>
  				<xsl:when test="$speciality = 'deptpneumology'">Pneumologue</xsl:when>
  				<xsl:when test="$speciality = 'deptpsychatry'">Psychiatre</xsl:when>
  				<xsl:when test="$speciality = 'deptradiology'">Radiologue</xsl:when>
  				<xsl:when test="$speciality = 'deptradiotherapy'">Radiothérapeute</xsl:when>
  				<xsl:when test="$speciality = 'deptrhumatology'">Rhumatologue</xsl:when>
  				<xsl:when test="$speciality = 'deptstomatology'">Stomatologue</xsl:when>
  				<xsl:when test="$speciality = 'deptsurgery'">Chirurgien</xsl:when>
  				<xsl:when test="$speciality = 'depttoxicology'">Toxicologue</xsl:when>
  				<xsl:when test="$speciality = 'depturology'">Urologue</xsl:when>
  				<xsl:when test="$speciality = 'orghospital'">Hospital</xsl:when>
  				<xsl:when test="$speciality = 'persbiologist'">Biologiste</xsl:when>
  				<xsl:when test="$speciality = 'persdentist'">Dentiste</xsl:when>
  				<xsl:when test="$speciality = 'persnurse'">Infirmier</xsl:when>
			</xsl:choose>
	</xsl:template>


	<xsl:template name="getSex">
    	<xsl:param name="sex"/>
    		<xsl:choose>
  				<xsl:when test="$sex = 'male'">Monsieur </xsl:when>
  				<xsl:when test="$sex = 'female'">Madame </xsl:when>
			</xsl:choose>
	</xsl:template>
	
	
	<xsl:template name="formatDate">
		<xsl:param name="DateTime" />
		<!-- date format 1998-03-15 -->
		<xsl:variable name="year">
			<xsl:value-of select="substring-before($DateTime,'-')" />
		</xsl:variable>
		<xsl:variable name="mo-temp">
			<xsl:value-of select="substring-after($DateTime,'-')" />
		</xsl:variable>
		<xsl:variable name="month">
			<xsl:value-of select="substring-before($mo-temp,'-')" />
		</xsl:variable>
		<xsl:variable name="day">
			<xsl:value-of select="substring-after($mo-temp,'-')" />
		</xsl:variable>
		<xsl:if test="$day != '00'">
			<xsl:value-of select="$day"/>
			<xsl:value-of select="' '"/>
		</xsl:if>
		<xsl:choose>
			<xsl:when test="$month = '1' or $month = '01'">Janvier </xsl:when>
			<xsl:when test="$month = '2' or $month = '02'">Février </xsl:when>
			<xsl:when test="$month = '3' or $month = '03'">Mars </xsl:when>
			<xsl:when test="$month = '4' or $month = '04'">Avril </xsl:when>
			<xsl:when test="$month = '5' or $month = '05'">Mai </xsl:when>
			<xsl:when test="$month = '6' or $month = '06'">Juin </xsl:when>
			<xsl:when test="$month = '7' or $month = '07'">Juillet </xsl:when>
			<xsl:when test="$month = '8' or $month = '08'">Août </xsl:when>
			<xsl:when test="$month = '9' or $month = '09'">Septembre </xsl:when>
			<xsl:when test="$month = '10'">Octobre </xsl:when>
			<xsl:when test="$month = '11'">Novembre </xsl:when>
			<xsl:when test="$month = '12'">Décembre </xsl:when>
			<xsl:when test="$month = '0' or $month = '00'"></xsl:when><!-- do nothing -->
		</xsl:choose>
		<xsl:value-of select="$year"/>
	</xsl:template>

</xsl:stylesheet>





