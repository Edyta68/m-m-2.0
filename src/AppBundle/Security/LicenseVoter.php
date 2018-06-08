<?php
/**
 * Created by PhpStorm.
 * User: fl4shy
 * Date: 08.06.2018
 * Time: 01:59
 */

namespace AppBundle\Security;

use MMBundle\Entity\license;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class LicenseVoter extends Voter
{
    // these strings are just invented: you can use anything
    const VIEW = 'view';
    const EDIT = 'edit';
    const DELETE = 'delete';
    const INDEX = 'index';

    protected function supports($attribute, $subject)
    {
        // if the attribute isn't one we support, return false
        if (!in_array($attribute, array(self::VIEW, self::EDIT, self::DELETE))) {
            return false;
        }

        // only vote on Post objects inside this voter
        if (!$subject instanceof license) {
            return false;
        }

        return true;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();
        if($attribute==self::EDIT) {
            if (!in_array('ROLE_ADMIN', $user->getRoles())) {

                return false;
            }
        }
        if($attribute==self::VIEW) {
            if (!in_array('ROLE_ADMIN', $user->getRoles())) {

                return false;
            }
        }
        if($attribute==self::INDEX) {
            if (!in_array('ROLE_ADMIN', $user->getRoles())) {

                return false;
            }
        }


        return true;
    }
}