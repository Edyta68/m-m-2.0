<?php
/**
 * Created by PhpStorm.
 * User: fl4shy
 * Date: 07.06.2018
 * Time: 12:07
 */

namespace AppBundle\Security;

use MMBundle\Entity\Attendance;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class AttendanceVoter extends Voter
{
    // these strings are just invented: you can use anything
    const FULLACCES = 'view';
    const ONLYWORKERS = 'edit';
    const ONLYAUDITOR = 'delete';

    protected function supports($attribute, $subject)
    {
        // if the attribute isn't one we support, return false
        if (!in_array($attribute, array(self::FULLACCES, self::ONLYWORKERS, self::ONLYAUDITOR))) {
            return false;
        }

        // only vote on Post objects inside this voter
        if (!$subject instanceof Attendance) {
            return false;
        }

        return true;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();

        if($attribute==self::FULLACCES) {
            if (!in_array('ROLE_ADMIN', $user->getRoles())) {

                return false;
            }
        }
        if($attribute==self::ONLYWORKERS) {
            if (!in_array('ROLE_AUDYTOR', $user->getRoles())) {

                return false;
            }
        }
        if($attribute==self::ONLYAUDITOR) {
            if (in_array('ROLE_PRACOWNIK', $user->getRoles())) {

                return false;
            }
        }


        return true;
    }
}