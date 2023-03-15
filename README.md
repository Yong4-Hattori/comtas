## アプリ名

「comtas」(コムタス) 

## 概要
　ファミリー向けのタスク共有アプリです。タスクを完了するとポイントがたまり、ごほうびチケットと交換できます！
　タスクの進捗はLINEで共有できます。



## URL

テストアカウント  
メール：test@mail.com  
パスワード：password

## 作成背景
身近な困りごとを解消できるものを作りたいと考え、家族間でのタスク管理アプリがあれば便利だと思い制作を決めました。
ただオンライン上でタスク管理をしても味気ないので、オフラインで使えるごほうび機能をつけ、
対面でのコミュニケーションを促すものを目指しました。

## 使用言語

* 言語
    * PHP
    * HTML
    * CSS
    * JavaScript

* フレームワーク
    * Laravel
    * Breeze
    * TailWindCSS

* API
    * LINE Messaging API

## 工夫点

* LINEAPIとの連携
    * 公式アカウントを通じてタスクの進捗を共有できます
    * 家族間での利用を前提としているため、公式アカウントを追加した全員に通知が配信されます
    
* 可読性
    *自分が見た瞬間に何の機能かわかること、また他の人が見てもわかりやすいことを意識して、コメントやインデントを入れました



## 改善したい点と追加したい機能
    * LINEにシェアした後、ポップアップ画面等で送信完了を知らせる
    * ユーザ名を変更してもリレーションの関係上タイムラインに反映されていない点を修正したい
    * スマホに対応したレイアウトに変更
　
## 利用方法

* トップページ
    * タスクが完了/未完了で分かれて一覧表示される
    * サイドメニューから各ページへ遷移する

* タスクを追加する
    *　サイドメニューより「タスクを追加」を選択
    *　タスクの概要と、完了時に付与するポイントを設定し、保存

* タスクを完了する
    *未完了タスク一覧に表示される「完了する」ボタンを押してください

* チケットを追加する
    * 所有ポイントに応じて交換できるご褒美チケットを設定します
    * サイドメニューより「チケットを追加」を選択
    * チケットの概要とポイントを設定し保存

* チケットを使用する
    * チケットを使用するときは「使用する」をクリックします
    
* タイムライン
    * 誰がいつ、どのタスクを完了したかを見ることができます
    * LINEアイコンを押すと公式ラインを通じてタスクの完了を共有できます
