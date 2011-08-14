<?php

/**
 * Simple class for dealing with the history. This class pushes and pops the urls of
 * the pages that the user has visited onto a stack in the session. This allows us
 * to exclude certain pages, eg: login/out, pages with POST data, etc. from the stack
 * so that we end up with a more dependable way of navigating to previous pages then
 * using $_SERVER['HTTP_REFERER']
 * @author Peter Goodman
 * @copyright Copyright 2007 Peter Goodman, all rights reserved.
 */
class History {
    private $exclude = FALSE;
    private $session;
    private $history = array();
    
    /**
     * Constructor, set up the stack if it doesn't exist.
     * @internal
     */
    public function __construct() {
                
        $this->session = get_instance()->session;
        
        // make sure the stack exists, first-in-last-out stack of
        // paths
        if(!$this->session->userdata('url_history')) {
            $this->session->set_userdata('url_history', array());
        }
        
        $this->history = $this->session->userdata('url_history');
                
        // make sure to do this, not necessarily necessary :P
        reset($this->history);
    }
    
    /**
     */
    public function __destruct() {
        unset($this->session);
    }
    
    /**
     * Push (actually unshift) a page onto the stack.
     */
    public function push($path) {
        if(!$this->exclude) {
                            
            // don't want duplicates
            if(current($this->history) != $path) {
                array_unshift($this->history, $path);
            }
            
            // we can safely use slice because we deal with un/shifting
            // and not pushing/popping. We slice to 5 pages so that the stack
            // is a manageable size
            $this->history = array_slice($this->history, 0, 5);
            
            // set the data
            $this->session->set_userdata('url_history', $this->history);
        }
    }
    
    /**
     * Pop (actually shift) a page off of the stack.
     */
    public function pop() {
        $url = array_shift($this->history);
        
        if(!$url) {
            $url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $_SERVER['PHP_SELF'];
        }
        
        return $url;
    }
    
    /**
     * Get the last (actually first) page off od the stack without
     * shifting it off.
     */
    public function end() {
        return isset($this->history[0]) ? $this->history[0] : (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $_SERVER['PHP_SELF']);
    }
    
    /**
     * Exclude a page from the stack.
     */
    public function exclude() {
        $this->exclude = TRUE;
    }
    
    /**
     * Clear out the history.
     */
    public function clear() {
        $this->history = array();
        $this->session->set_userdata('url_history', $this->history);
    }
    
    /**
     */
    public function export() {
        return $this->history;
    }
} 