<?php

namespace App\Helpers;

class DashBoard_helper
{
    function already_home($user, $username)
    {
        return $user->select(['githubUsername', 'id', 'created_at'])->where('githubUsername', $username)->first();
    }

    function already_user_data($user)
    {
        return $user
            ->select('repo.*,issue.*')
            ->join('issue', 'users.id = issue.user_id')
            ->join('repo', 'users.id = repo.user_id')
            ->where('users.id', session()->get('userId'))
            ->get()
            ->getResult();
    }


    /**
     * This function returns all repo detais
     * of current user logged in 
     * for addPrsAlready Page
     */
    function alreadyPrs_repo_data($repo)
    {
        return $repo
            ->select("
                repo.id as repoId,
                repo_name,
                COUNT(issue.issue_number) as total_issues, 
                repo.created_at,
                repo.updated_at
            ")
            ->join("issue", "repo.id = issue.repo_id", 'left')
            ->where("repo.user_id", session()->get('userId'))
            ->groupBy('repo.repo_name')
            ->orderBy('total_issues', 'desc')
            ->get()
            ->getResult();
    }

    function add_pr_repo_name($repo)
    {
        return $repo
            ->select('repo.repo_name')
            ->where('repo.user_id', session()->get('userId'))
            ->get()
            ->getResult();
    }
}
