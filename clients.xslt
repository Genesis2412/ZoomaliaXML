<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<?php
    session_start();
?>
<html> 
    <head>
        <style>
            h2
            {
                padding-top: 40px;
                text-align: center;
                font-size: 30px;
                text-decoration: underline;
                text-underline-position: under;
                text-decoration-color: #7700C6;
            }

            #tags
            {
                font-weight: bold;
                font-size: 16px;
            }
            
            table
            {
                border-radius:10px;
                margin-top: 70px;
                margin-left: auto;
                margin-right: auto;
                width: 70%;
                border: 1px solid white;
            }

            th
            {
                background-color: #7C7C7C;
                text-align: center;
                color: white;
            }

            table td
            {
                padding: 20px;
                background-color:#C8C8C8;
            }

            a:link,a:visited
            {
                color: black;
                text-decoration: none;
            }

            a:hover
            {
                color: purple;
            }

            @media(max-width: 991px)
            {   
                table
                {
                   font-size: 15px;
                }
            }

        </style>
    </head>
    <body> 
            <h2>Products Sold</h2> 
                <div style="overflow-x: auto;">
                    <table border="1">
                        <tr>
                            <th>Client Name</th>
                            <th>Product Name</th>
                            <th>Product Quantity</th>
                            <th>Product Price</th>
                            <th>Date Bought</th>
                            <th>Email</th>
                        </tr>

                    <xsl:for-each select='Clients/client'>                        

                        <xsl:sort select="Date"/>
                            
                            <tr>
                                <td><xsl:value-of select="Name/text()"/></td>
                                <td><xsl:value-of select="product/Productname/text()"/></td>     
                                <td><xsl:value-of select="product/Quantity/text()"/></td>
                                <td><xsl:value-of select="product/Price/text()"/></td> 
                                <td><xsl:value-of select="product/Date/text()"/></td> 
                                <td>
                                    <a href="mailto:{Email/text()}"><xsl:value-of select="Email/text()"/></a>                                    
                                </td>                  
                            </tr>

                           

                            <tr>
                                
                            </tr>
                            

                    </xsl:for-each>
                    </table>
                </div>

                    <table border="1">                    
                        <tr>
                            <td id="tags">Total Items Sold</td>
                            <td><xsl:value-of select="sum(Clients/client/product/Quantity/text())"/></td>

                            <td id="tags">Total Cost (Rs)</td> 
                            <td><xsl:value-of select="sum(Clients/client/product/Price/text())"/></td>
                        </tr> 
                    </table>                             
    </body> 
</html>
</xsl:template>
</xsl:stylesheet>