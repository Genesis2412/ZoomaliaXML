<?php

    $id=1;
    $name="Hiresh Pandoo";
    $email="hiresh3p@gmail.com";
    $phone=59027511;
    $city="Moka";
    $zip=472286;
    $address="Upper Dagotiere, Dassoa Road";
    $accnum=35512585526;
    $month="Jan";
    $year=2021;
    $expirydate=($month .' '. $year);
    $pname="Collar";
    $quantity=2;
    $price=2000.50;

    if(!file_exists('clients.xml'))
    {
        $dom = new DOMDocument();

        $dom->encoding = 'utf-8';

        $dom->xmlVersion = '1.0';

        $dom->formatOutput = true;

        $xml_file_name = 'clients.xml';

            $root = $dom->createElement('Clients');

                $client_node = $dom->createElement('client');

                    $attr_client_id = new DOMAttr('client_id', $id);
                    $client_node->setAttributeNode($attr_client_id);

                    $child_node_name = $dom->createElement('Name', $name);
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
                    
                    $child_node_accountnum = $dom->createElement('Accountnum', $accnum);
                    $card_node->appendChild($child_node_accountnum);
                    
                    $child_node_expirydate = $dom->createElement('Expirydate', $expirydate);
                    $card_node->appendChild($child_node_expirydate);
                    
                $client_node->appendChild($card_node);

                //Product details
                $product_node = $dom->createElement('product');

                    $child_node_productname = $dom->createElement('Productname', $pname);
                    $product_node->appendChild($child_node_productname);

                    $child_node_quantity = $dom->createElement('Quantity', $quantity);
                    $product_node->appendChild($child_node_quantity);
            
                    $child_node_price = $dom->createElement('Price', $price);
                    $product_node->appendChild($child_node_price);
                
                $client_node->appendChild($product_node);


            $root->appendChild($client_node);

            $dom->appendChild($root);

        //Save to XML file
        $dom->save($xml_file_name);

        echo "$xml_file_name has been successfully created";
    }
    else
    {
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

            $child_node_name = $dom->createElement('Name', 'Hiresh Pandoo');
            $client_node->appendChild($child_node_name);

            $child_node_email = $dom->createElement('Email', 'hiresh3p@gmail.com');
            $client_node->appendChild($child_node_email);

            $child_node_phone = $dom->createElement('Phone', '59027511');
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
                        
                $child_node_accountnum = $dom->createElement('Accountnum', $accnum);
                $card_node->appendChild($child_node_accountnum);
                
                $child_node_expirydate = $dom->createElement('Expirydate', $expirydate);
                $card_node->appendChild($child_node_expirydate);
                
            $client_node->appendChild($card_node);

            //Product details
            $product_node = $dom->createElement('product');

                $child_node_productname = $dom->createElement('Productname', 'Collar');
                $product_node->appendChild($child_node_productname);

                $child_node_quantity = $dom->createElement('Quantity', 2);
                $product_node->appendChild($child_node_quantity);
        
                $child_node_price = $dom->createElement('Price', 2000.50);
                $product_node->appendChild($child_node_price);

            $client_node->appendChild($product_node);

            //Save to XML file
            $dom->save('clients.xml');
            echo 'Done'; 
    }
?>