<?php
	session_start();
	include('connection.php');

	//check if we clicked the button in donate.php
	if (isset($_POST['submit'])) 
	{
		$names= mysqli_escape_string($connection, $_POST['names']);
		$email= mysqli_escape_string($connection, $_POST['email']);
		$phone= mysqli_escape_string($connection, $_POST['phone']);
		$city= mysqli_escape_string($connection, $_POST['city']);
		$zip= mysqli_escape_string($connection, $_POST['zip']);
		$address= mysqli_escape_string($connection, $_POST['address']);
		$accno= mysqli_escape_string($connection, $_POST['accno']);
		$month= mysqli_escape_string($connection, $_POST['month']);
		$year= mysqli_escape_string($connection, $_POST['year']);
		$expirydate= ($month .' '. $year);
		$date= date("Y/m/d");

		//check if fields are empty
		if(empty($names) || empty($email) || empty($phone) || empty($city) || empty($zip) || empty($address) || empty($accno) || empty($month) || empty($year))
	 	{
			echo "<h3 style='color:red;' >Please fill all fields!</h3>";
		}
		//validating email
		elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
		{
			echo "<h3 style='color:red;' >Enter a valid email!</h3>";
		}
		else 
		{
			echo "<h3 style='color:green;'>Product(s) Bought Successfully</h3>";
		}
	}
	else 
	{
		echo " An Error Occured, Sorry";
	}

	//inserting values into xml file
	if(!empty($names) && !empty($email) && !empty($phone) && !empty($city) && !empty($zip) && !empty($address) && !empty($accno) && !empty($month) && !empty($year))
	{
		if(!empty($_SESSION["cart"]))
        {
            foreach($_SESSION["cart"] as $objects => $values)
            {
            	$name=mysqli_escape_string($connection, $values["item_name"]);
            	$quantity=mysqli_escape_string($connection, $values["item_quantity"]); 
				$price=mysqli_escape_string($connection, $values["item_price"]);
				$image=mysqli_escape_string($connection, $values["item_image"]);

				if(!file_exists('clients.xml'))
				{
					$id = 1;
					$dom = new DOMDocument();

					$dom->encoding = 'utf-8';

					$dom->xmlVersion = '1.0';

					$dom->formatOutput = true;

					$xml_file_name = 'clients.xml';

					$root = $dom->createElement('Clients');

					$attr_xsd = new DOMAttr('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
					$root->setAttributeNode($attr_xsd);

					$attr_xsd_location = new DOMAttr('xsi:noNamespaceSchemaLocation', 'clients.xsd');
					$root->setAttributeNode($attr_xsd_location);

						$client_node = $dom->createElement('client');

							$attr_client_id = new DOMAttr('id', $id);
							$client_node->setAttributeNode($attr_client_id);

							$child_node_name = $dom->createElement('Name', $names);
							$client_node->appendChild($child_node_name);

							$child_node_email = $dom->createElement('Email', $email);
							$client_node->appendChild($child_node_email);

							$child_node_phone = $dom->createElement('Phone', $phone);
							$client_node->appendChild($child_node_phone);

							//address details
							$address_node = $dom->createElement('address');

								$child_node_city = $dom->createElement('City', $city);
								$address_node->appendChild($child_node_city);
								
								$child_node_zip = $dom->createElement('Zip', $zip);
								$address_node->appendChild($child_node_zip);
								
								$child_node_address = $dom->createElement('Address', $address);
								$address_node->appendChild($child_node_address);
							
							$client_node->appendChild($address_node);
							
							//Card details
							$card_node = $dom->createElement('bankcard');
								
								$child_node_accountnum = $dom->createElement('Accountnum', $accno);
								$card_node->appendChild($child_node_accountnum);
								
								$child_node_expirydate = $dom->createElement('Expirydate', $expirydate);
								$card_node->appendChild($child_node_expirydate);
								
							$client_node->appendChild($card_node);

							//Product details
							$product_node = $dom->createElement('product');

								$child_node_productname = $dom->createElement('Productname', $name);
								$product_node->appendChild($child_node_productname);

								$child_node_quantity = $dom->createElement('Quantity', $quantity);
								$product_node->appendChild($child_node_quantity);
						
								$child_node_price = $dom->createElement('Price', $price);
								$product_node->appendChild($child_node_price);

								$child_node_image = $dom->createElement('Image', $image);
								$product_node->appendChild($child_node_image);

								$child_node_date = $dom->createElement('Date', $date);
								$product_node->appendChild($child_node_date);
							
							$client_node->appendChild($product_node);

            			$root->appendChild($client_node);

            		$dom->appendChild($root);

					//Save to XML file
					$dom->save($xml_file_name);

        			echo "$xml_file_name has been successfully created";
				}
				else
				{
					$id = 0;
					//getting the id(attribute) from the last element
					$xml=simplexml_load_file("clients.xml") or die("Error: Cannot create object");
					$getlast = $xml->xpath('/Clients/client[last()]/@id');

					foreach($getlast as $getid)
					{
						$id = $getid + 1;//incrementing the last value by 1;
					}

					$dom = new DOMDocument();
					$dom->load('clients.xml');
					$dom->formatOutput = true;

					// Get the root element
					$root = $dom->getElementsByTagName('Clients');
					$child_node = $root->item(0);        

					// Create a new element
					$client_node = $dom->createElement('client');        
						$client_node->setAttribute( 'id', $id );
						$child_node->appendChild( $client_node );

						$child_node_name = $dom->createElement('Name', $names);
						$client_node->appendChild($child_node_name);

						$child_node_email = $dom->createElement('Email', $email);
						$client_node->appendChild($child_node_email);

						$child_node_phone = $dom->createElement('Phone', $phone);
						$client_node->appendChild($child_node_phone);

						//Address details
						$address_node = $dom->createElement('address');

							$child_node_city = $dom->createElement('City', $city);
							$address_node->appendChild($child_node_city);
							
							$child_node_zip = $dom->createElement('Zip', $zip);
							$address_node->appendChild($child_node_zip);
							
							$child_node_address = $dom->createElement('Address', $address);
							$address_node->appendChild($child_node_address);
						
						$client_node->appendChild($address_node);
                
						//Card details
						$card_node = $dom->createElement('bankcard');
									
							$child_node_accountnum = $dom->createElement('Accountnum', $accno);
							$card_node->appendChild($child_node_accountnum);
							
							$child_node_expirydate = $dom->createElement('Expirydate', $expirydate);
							$card_node->appendChild($child_node_expirydate);
							
						$client_node->appendChild($card_node);

						//Product details
						$product_node = $dom->createElement('product');

							$child_node_productname = $dom->createElement('Productname', $name);
							$product_node->appendChild($child_node_productname);

							$child_node_quantity = $dom->createElement('Quantity', $quantity);
							$product_node->appendChild($child_node_quantity);
					
							$child_node_price = $dom->createElement('Price', $price);
							$product_node->appendChild($child_node_price);

							$child_node_image = $dom->createElement('Image', $image);
							$product_node->appendChild($child_node_image);

							$child_node_date = $dom->createElement('Date', $date);
							$product_node->appendChild($child_node_date);

						$client_node->appendChild($product_node);

						//Save to XML file
						$dom->save('clients.xml');
						echo 'Done'; 
    			}
				unset($_SESSION["cart"][$objects]);
			}
		}
	}
?>
