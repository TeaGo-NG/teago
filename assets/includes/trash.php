function t_UserData($user_id, $password = true) {
        global $t, $sqlConnect;
        if (empty($user_id) || !is_numeric($user_id) || $user_id < 0) {
            return false;
        }
        $data           = array();
        $user_id        = t_Secure($user_id);
        $query_one      = "SELECT * FROM " . T_USERS . " WHERE `user_id` = {$user_id}";
        $hashed_user_Id = md5($user_id);
        if ($t['config']['cacheSystem'] == 1) {
            $fetched_data = $cache->read($hashed_user_Id . '_U_Data.tmp');
            if (empty($fetched_data)) {
                $sql          = mysqli_query($sqlConnect, $query_one);
                if (mysqli_num_rows($sql)) {
                    $fetched_data = mysqli_fetch_assoc($sql);
                    $cache->write($hashed_user_Id . '_U_Data.tmp', $fetched_data);
                }
                    
            }
        } else {
            $sql          = mysqli_query($sqlConnect, $query_one);
            if (mysqli_num_rows($sql)) {
                $fetched_data = mysqli_fetch_assoc($sql);
            }
            
        }
        if (empty($fetched_data)) {
            return array();
        }
        if ($password == false) {
            unset($fetched_data['password']);
        }
        $fetched_data['avatar_post_id'] = 0;
        $fetched_data['cover_post_id'] = 0;
        // $query_avatar  = mysqli_query($sqlConnect, " SELECT `id`  FROM " . T_POSTS . "  WHERE `postType` = 'profile_picture' AND `user_id` = {$user_id} ORDER BY 'id' DESC");
        // if (mysqli_num_rows($query_avatar)) {
        //     $query_avatar_data = mysqli_fetch_assoc($query_avatar);
        //     if (!empty($query_avatar_data) && !empty($query_avatar_data['id'])) {
        //         $fetched_data['avatar_post_id'] = $query_avatar_data['id'];
        //     }
        // }
        // $query_avatar  = mysqli_query($sqlConnect, " SELECT `id`  FROM " . T_POSTS . "  WHERE `postType` = 'profile_cover_picture' AND `user_id` = {$user_id} ORDER BY 'id' DESC");
        // if (mysqli_num_rows($query_avatar)) {
        //     $query_avatar_data = mysqli_fetch_assoc($query_avatar);
        //     if (!empty($query_avatar_data) && !empty($query_avatar_data['id'])) {
        //         $fetched_data['cover_post_id'] = $query_avatar_data['id'];
        //     }
        // }
        $fetched_data['avatar_org'] = $fetched_data['avatar'];
        $fetched_data['cover_org']  = $fetched_data['cover'];
        $explode2                   = @end(explode('.', $fetched_data['cover']));
        $explode3                   = @explode('.', $fetched_data['cover']);
        $fetched_data['cover_full'] = $t['userDefaultCover'];
        if ($fetched_data['cover'] != $t['userDefaultCover']) {
            @$fetched_data['cover_full'] = $explode3[0] . '_full.' . $explode2;
        }
        $explode2                   = @end(explode('.', $fetched_data['avatar']));
        $explode3                   = @explode('.', $fetched_data['avatar']);
        if ($fetched_data['avatar'] != $t['userDefaultAvatar'] && $fetched_data['avatar'] != $t['userDefaultFAvatar']) {
            @$fetched_data['avatar_full'] = $explode3[0] . '_full.' . $explode2;
        }
        $fetched_data['avatar'] = Wo_GetMedia($fetched_data['avatar']) . '?cache=' . $fetched_data['last_avatar_mod'];
        $fetched_data['cover']  = Wo_GetMedia($fetched_data['cover']) . '?cache=' . $fetched_data['last_cover_mod'];
        $fetched_data['id']     = $fetched_data['user_id'];
        $fetched_data['user_platform'] = Wo_GetPlatformFromUser_ID($fetched_data['user_id']);
        $fetched_data['type']   = 'user';
        $fetched_data['url']    = Wo_SeoLink('index.php?link1=timeline&u=' . $fetched_data['username']);
        $fetched_data['name']   = '';
        if (!empty($fetched_data['first_name'])) {
            if (!empty($fetched_data['last_name'])) {
                $fetched_data['name'] = $fetched_data['first_name'] . ' ' . $fetched_data['last_name'];
            } else {
                $fetched_data['name'] = $fetched_data['first_name'];
            }
        } else {
            $fetched_data['name'] = $fetched_data['username'];
        }
        if (!empty($fetched_data['details'])) {
            $fetched_data['details'] = (Array) json_decode($fetched_data['details']);
        }
        $fetched_data['following_data'] = '';
        $fetched_data['followers_data'] = '';
        $fetched_data['mutual_friends_data'] = '';
        $fetched_data['likes_data'] = '';
        $fetched_data['groups_data'] = '';
        $fetched_data['album_data'] = '';
        if (!empty($fetched_data['sidebar_data'])) {
            $sidebar_data = (Array) json_decode($fetched_data['sidebar_data']);
            if (!empty($sidebar_data['following_data'])) {
                $fetched_data['following_data'] = $sidebar_data['following_data'];
            }
            if (!empty($sidebar_data['followers_data'])) {
                $fetched_data['followers_data'] = $sidebar_data['followers_data'];
            }
            if (!empty($sidebar_data['mutual_friends_data'])) {
                $fetched_data['mutual_friends_data'] = $sidebar_data['mutual_friends_data'];
            }
            if (!empty($sidebar_data['likes_data'])) {
                $fetched_data['likes_data'] = $sidebar_data['likes_data'];
            }
            if (!empty($sidebar_data['groups_data'])) {
                $fetched_data['groups_data'] = $sidebar_data['groups_data'];
            }
            if (!empty($sidebar_data['album_data'])) {
                $fetched_data['album_data'] = $sidebar_data['album_data'];
            }
        }
        $fetched_data['website'] = (strpos($fetched_data['website'], 'http') === false && !empty($fetched_data['website'])) ? 'http://' . $fetched_data['website'] : $fetched_data['website'];
        $fetched_data['working_link'] = (strpos($fetched_data['working_link'], 'http') === false && !empty($fetched_data['working_link'])) ? 'http://' . $fetched_data['working_link'] : $fetched_data['working_link'];
        $fetched_data['lastseen_unix_time'] = $fetched_data['lastseen'];
        if ($t['config']['node_socket_flow'] == "1") {
            $time     = time() - 02;
        } else {
            $time     = time() - 60;
        }
        $fetched_data['lastseen_status'] = ($fetched_data['lastseen'] > $time) ? 'on' : 'off';
        return $fetched_data;
    }