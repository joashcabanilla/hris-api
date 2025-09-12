<?php

namespace App\Actions\Account;

class GetPrefixSuffixListAction extends BaseAction
{
    /**
     * @return object
     */
    public function handle() : object
    {
        $list = $this->accountService->getPrefixSuffixList();
         if($list){
            $result["success"] = true;
            $result["message"] = "List of prefixes and suffixes successfully fetched.";
            $result["data"] = $list;
        }
        return (object) $result;
    }
}