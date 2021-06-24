<?php


class LDAP
{


    public function ldapConn($group)
    {
        $ldap_dn = "cn=read-only-admin,dc=example,dc=com";
        $ldap_password = "password";
        $ldap_con = ldap_connect("ldap.forumsys.com");
        ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION,3);
        if(ldap_bind($ldap_con,$ldap_dn,$ldap_password)) {
            echo "Bind succesfull";
            $filter = "(ou=$group)";
            $result = ldap_search($ldap_con,"dc=example,dc=com", $filter ) or exit ("Unable to search");
            $entries = ldap_get_entries($ldap_con, $result);
            echo "<table>";
            foreach ($entries[0]["uniquemember"] as $entry) {

                echo "<tr><td>". $entry ."</td>";
            }
            echo "</table>";
            /*print "<pre>";
             print_r($entries[0]["uniquemember"][0]);
             print "<pre>";*/
        } else {
            echo "connection failed";
        }
    }
}