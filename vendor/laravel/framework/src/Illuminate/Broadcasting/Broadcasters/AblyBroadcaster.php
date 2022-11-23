<?php

namespace Illuminate\Broadcasting\Broadcasters;

use Ably\AblyRest;
<<<<<<< HEAD
use Ably\Models\Message as AblyMessage;
=======
use Ably\Exceptions\AblyException;
use Ably\Models\Message as AblyMessage;
use Illuminate\Broadcasting\BroadcastException;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

/**
 * @author Matthew Hall (matthall28@gmail.com)
 * @author Taylor Otwell (taylor@laravel.com)
 */
class AblyBroadcaster extends Broadcaster
{
    /**
     * The AblyRest SDK instance.
     *
     * @var \Ably\AblyRest
     */
    protected $ably;

    /**
     * Create a new broadcaster instance.
     *
     * @param  \Ably\AblyRest  $ably
     * @return void
     */
    public function __construct(AblyRest $ably)
    {
        $this->ably = $ably;
    }

    /**
     * Authenticate the incoming request for a given channel.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     *
     * @throws \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException
     */
    public function auth($request)
    {
        $channelName = $this->normalizeChannelName($request->channel_name);

        if (empty($request->channel_name) ||
            ($this->isGuardedChannel($request->channel_name) &&
            ! $this->retrieveUser($request, $channelName))) {
            throw new AccessDeniedHttpException;
        }

        return parent::verifyUserCanAccessChannel(
            $request, $channelName
        );
    }

    /**
     * Return the valid authentication response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $result
     * @return mixed
     */
    public function validAuthenticationResponse($request, $result)
    {
<<<<<<< HEAD
        if (Str::startsWith($request->channel_name, 'private')) {
=======
        if (str_starts_with($request->channel_name, 'private')) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            $signature = $this->generateAblySignature(
                $request->channel_name, $request->socket_id
            );

            return ['auth' => $this->getPublicToken().':'.$signature];
        }

        $channelName = $this->normalizeChannelName($request->channel_name);

        $user = $this->retrieveUser($request, $channelName);

        $broadcastIdentifier = method_exists($user, 'getAuthIdentifierForBroadcasting')
                    ? $user->getAuthIdentifierForBroadcasting()
                    : $user->getAuthIdentifier();

        $signature = $this->generateAblySignature(
            $request->channel_name,
            $request->socket_id,
            $userData = array_filter([
                'user_id' => (string) $broadcastIdentifier,
                'user_info' => $result,
            ])
        );

        return [
            'auth' => $this->getPublicToken().':'.$signature,
            'channel_data' => json_encode($userData),
        ];
    }

    /**
     * Generate the signature needed for Ably authentication headers.
     *
     * @param  string  $channelName
     * @param  string  $socketId
     * @param  array|null  $userData
     * @return string
     */
    public function generateAblySignature($channelName, $socketId, $userData = null)
    {
        return hash_hmac(
            'sha256',
            sprintf('%s:%s%s', $socketId, $channelName, $userData ? ':'.json_encode($userData) : ''),
            $this->getPrivateToken(),
        );
    }

    /**
     * Broadcast the given event.
     *
     * @param  array  $channels
     * @param  string  $event
     * @param  array  $payload
     * @return void
<<<<<<< HEAD
     */
    public function broadcast(array $channels, $event, array $payload = [])
    {
        foreach ($this->formatChannels($channels) as $channel) {
            $this->ably->channels->get($channel)->publish(
                $this->buildAblyMessage($event, $payload)
=======
     *
     * @throws \Illuminate\Broadcasting\BroadcastException
     */
    public function broadcast(array $channels, $event, array $payload = [])
    {
        try {
            foreach ($this->formatChannels($channels) as $channel) {
                $this->ably->channels->get($channel)->publish(
                    $this->buildAblyMessage($event, $payload)
                );
            }
        } catch (AblyException $e) {
            throw new BroadcastException(
                sprintf('Ably error: %s', $e->getMessage())
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            );
        }
    }

    /**
     * Build an Ably message object for broadcasting.
     *
     * @param  string  $event
     * @param  array  $payload
     * @return \Ably\Models\Message
     */
    protected function buildAblyMessage($event, array $payload = [])
    {
        return tap(new AblyMessage, function ($message) use ($event, $payload) {
            $message->name = $event;
            $message->data = $payload;
            $message->connectionKey = data_get($payload, 'socket');
        });
    }

    /**
     * Return true if the channel is protected by authentication.
     *
     * @param  string  $channel
     * @return bool
     */
    public function isGuardedChannel($channel)
    {
        return Str::startsWith($channel, ['private-', 'presence-']);
    }

    /**
     * Remove prefix from channel name.
     *
     * @param  string  $channel
     * @return string
     */
    public function normalizeChannelName($channel)
    {
        if ($this->isGuardedChannel($channel)) {
<<<<<<< HEAD
            return Str::startsWith($channel, 'private-')
=======
            return str_starts_with($channel, 'private-')
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
                        ? Str::replaceFirst('private-', '', $channel)
                        : Str::replaceFirst('presence-', '', $channel);
        }

        return $channel;
    }

    /**
     * Format the channel array into an array of strings.
     *
     * @param  array  $channels
     * @return array
     */
    protected function formatChannels(array $channels)
    {
        return array_map(function ($channel) {
            $channel = (string) $channel;

            if (Str::startsWith($channel, ['private-', 'presence-'])) {
<<<<<<< HEAD
                return Str::startsWith($channel, 'private-')
=======
                return str_starts_with($channel, 'private-')
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
                    ? Str::replaceFirst('private-', 'private:', $channel)
                    : Str::replaceFirst('presence-', 'presence:', $channel);
            }

            return 'public:'.$channel;
        }, $channels);
    }

    /**
     * Get the public token value from the Ably key.
     *
     * @return mixed
     */
    protected function getPublicToken()
    {
        return Str::before($this->ably->options->key, ':');
    }

    /**
     * Get the private token value from the Ably key.
     *
     * @return mixed
     */
    protected function getPrivateToken()
    {
        return Str::after($this->ably->options->key, ':');
    }

    /**
     * Get the underlying Ably SDK instance.
     *
     * @return \Ably\AblyRest
     */
    public function getAbly()
    {
        return $this->ably;
    }
}
