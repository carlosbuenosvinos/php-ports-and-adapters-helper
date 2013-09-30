<?php

namespace HexArch;

/**
 * Interface UseCase
 * @package HexArch
 * @author Carlos Buenosvinos (hi@©arlos.io)
 */
interface UseCase
{
    public function execute(Request $request);
}